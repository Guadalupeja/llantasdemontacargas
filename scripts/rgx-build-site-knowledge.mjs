
import fs from 'node:fs';
import path from 'node:path';
import crypto from 'node:crypto';
import process from 'node:process';

const coreRoot =
    process.cwd();

const workspace =
    path.resolve(
        coreRoot,
        '..'
    );

const outputPath =
    path.join(
        coreRoot,
        'resources',
        'data',
        'chatbot',
        'site-knowledge.json'
    );

const checkOnly =
    process.argv.includes(
        '--check'
    );

const specs = {
    montacargas: {
        root: coreRoot,
        directories: [
            'resources/views/pages'
        ],
        files: [
            'resources/views/welcome.blade.php'
        ]
    },

    minicargadores: {
        root: path.join(
            workspace,
            'llantasparaminicargadores'
        ),
        directories: [
            'resources/views/pages',
            'resources/views/categories',
            'resources/views/products',
            'database/seeders'
        ],
        files: [
            'app/Http/Controllers/PageController.php'
        ]
    },

    bobcat: {
        root: path.join(
            workspace,
            'llantasbobcat'
        ),
        directories: [
            'resources/views/pages'
        ],
        files: [
            'resources/data/bobcat-products.php',
            'resources/data/store-products.php'
        ]
    }
};

const allowedExtensions = [
    '.php'
];

function walk(dir) {
    if (!fs.existsSync(dir)) {
        return [];
    }

    return fs.readdirSync(
        dir,
        {
            withFileTypes: true
        }
    )
        .flatMap(entry => {
            const full =
                path.join(
                    dir,
                    entry.name
                );

            if (entry.isDirectory()) {
                return walk(full);
            }

            if (
                entry.isFile()
                && allowedExtensions.some(
                    ext =>
                        entry.name.endsWith(
                            ext
                        )
                )
            ) {
                return [full];
            }

            return [];
        });
}

function decodeBasicHtml(value) {
    return value
        .replaceAll('&nbsp;', ' ')
        .replaceAll('&amp;', '&')
        .replaceAll('&quot;', '"')
        .replaceAll('&#039;', "'")
        .replaceAll('&lt;', '<')
        .replaceAll('&gt;', '>');
}

function normalize(value) {
    return decodeBasicHtml(
        String(value ?? '')
    )
        .replace(/\r/g, '')
        .replace(/[ \t]+/g, ' ')
        .replace(/\n[ \t]+/g, '\n')
        .replace(/\n{3,}/g, '\n\n')
        .trim();
}

function useful(value) {
    const text =
        normalize(value);

    if (text.length < 20) {
        return false;
    }

    if (
        /^https?:\/\//i.test(text)
        || /^\/?[a-z0-9_.\/-]+\.(?:png|jpe?g|webp|svg|pdf)$/i
            .test(text)
    ) {
        return false;
    }

    const letters =
        (
            text.match(
                /[A-Za-z??????????????]/g
            )
            ?? []
        ).length;

    return letters >= 8;
}

function stripHtmlTags(value) {
    let output = '';
    let inTag = false;
    let quote = null;

    for (
        let i = 0;
        i < value.length;
        i++
    ) {
        const char =
            value[i];

        if (!inTag) {
            if (char === '<') {
                inTag = true;
                quote = null;
                output += '\n';
                continue;
            }

            output += char;
            continue;
        }

        if (quote !== null) {
            if (
                char === quote
                && value[i - 1] !== '\\'
            ) {
                quote = null;
            }

            continue;
        }

        if (
            char === '"'
            || char === "'"
        ) {
            quote = char;
            continue;
        }

        if (char === '>') {
            inTag = false;
            output += '\n';
        }
    }

    return output;
}

function extractBladeText(raw) {
    let text = raw;

    text =
        text.replace(
            /<script\b[\s\S]*?<\/script>/gi,
            ' '
        );

    text =
        text.replace(
            /<style\b[\s\S]*?<\/style>/gi,
            ' '
        );

    text =
        text.replace(
            /\{\{--[\s\S]*?--\}\}/g,
            ' '
        );

    text =
        text.replace(
            /<\?php[\s\S]*?\?>/g,
            ' '
        );

    text =
        text.replace(
            /@php[\s\S]*?@endphp/g,
            ' '
        );

    text =
        text.replace(
            /\{!![\s\S]*?!!\}/g,
            ' '
        );

    text =
        text.replace(
            /\{\{[\s\S]*?\}\}/g,
            ' '
        );

    text =
        text.replace(
            /@[A-Za-z][^\n]*/g,
            ' '
        );

    text =
        stripHtmlTags(text);

    return normalize(text)
        .split('\n')
        .map(normalize)
        .filter(useful);
}

function unescapePhp(value) {
    return String(value)
        .replace(/\\'/g, "'")
        .replace(/\\"/g, '"')
        .replace(/\\n/g, ' ')
        .replace(/\\r/g, ' ')
        .replace(/\\t/g, ' ')
        .replace(/\\\\/g, '\\');
}

function extractPhpStrings(raw) {
    const values = [];

    const patterns = [
        /=>\s*'((?:\\.|[^'])*)'/g,
        /=>\s*"((?:\\.|[^"])*)"/g,
        /^\s*'((?:\\.|[^'])*)'\s*,?\s*$/gm,
        /^\s*"((?:\\.|[^"])*)"\s*,?\s*$/gm
    ];

    for (const pattern of patterns) {
        for (
            const match
            of raw.matchAll(pattern)
        ) {
            const value =
                normalize(
                    unescapePhp(
                        match[1]
                    )
                );

            if (useful(value)) {
                values.push(value);
            }
        }
    }

    return values;
}

function unique(values) {
    return [
        ...new Set(
            values
                .map(normalize)
                .filter(Boolean)
        )
    ];
}

function chunksFrom(values) {
    const chunks = [];

    let current = '';

    for (const item of values) {
        if (
            current
            && (
                current.length
                + item.length
                + 2
            ) > 900
        ) {
            chunks.push(current);
            current = '';
        }

        current =
            current
                ? current + '\n' + item
                : item;
    }

    if (current) {
        chunks.push(current);
    }

    return chunks;
}

const modelVocabulary = [
    'XP800',
    'XP1000',
    'PS800',
    'PS1000',
    'T-800',
    'T-900',
    'TR-900',

    'SK-02',
    'SK-05',
    'SK-800',
    'SK-900',
    'SK-900 ND',
    'SKS-900',
    'SKS900',
    'BIG BOY',

    'Brawler HPS',
    'Brawler HD'
];

function modelsIn(text) {
    const lower =
        text.toLowerCase();

    return unique(
        modelVocabulary.filter(
            model =>
                lower.includes(
                    model.toLowerCase()
                )
        )
    );
}

function measuresIn(text) {
    const matches =
        text.match(
            /\b(?:\d{1,3}(?:\.\d+)?[-x?]\d{1,3}(?:\.\d+)?(?:[-x?]\d{1,3}(?:\.\d+)?)?(?:\/\d+(?:\.\d+)?)?)\b/gi
        ) ?? [];

    return unique(matches);
}

function sha(value) {
    return crypto
        .createHash('sha256')
        .update(value)
        .digest('hex');
}

const documents = [];

const sourceSummary = {};

for (
    const [site, spec]
    of Object.entries(specs)
) {
    if (!fs.existsSync(spec.root)) {
        throw new Error(
            'No existe repo requerido: '
            + spec.root
        );
    }

    const files = unique([
        ...spec.directories.flatMap(
            relative =>
                walk(
                    path.join(
                        spec.root,
                        relative
                    )
                )
        ),
        ...spec.files.map(
            relative =>
                path.join(
                    spec.root,
                    relative
                )
        )
            .filter(
                full =>
                    fs.existsSync(full)
            )
    ])
        .sort();

    let siteDocuments = 0;

    for (const fullPath of files) {
        const relativePath =
            path.relative(
                spec.root,
                fullPath
            )
                .replaceAll(
                    '\\',
                    '/'
                );

        const raw =
            fs.readFileSync(
                fullPath,
                'utf8'
            );

        let values = [];

        if (
            relativePath.endsWith(
                '.blade.php'
            )
        ) {
            values.push(
                ...extractBladeText(raw)
            );
        }

        values.push(
            ...extractPhpStrings(raw)
        );

        values =
            unique(values);

        const chunks =
            chunksFrom(values);

        chunks.forEach(
            (content, index) => {
                const seed =
                    site
                    + '|'
                    + relativePath
                    + '|'
                    + index
                    + '|'
                    + content;

                documents.push({
                    id:
                        site
                        + '-'
                        + sha(seed).slice(
                            0,
                            16
                        ),

                    site,

                    authority:
                        'site_editorial',

                    source_path:
                        relativePath,

                    chunk:
                        index + 1,

                    models:
                        modelsIn(content),

                    measures:
                        measuresIn(content),

                    content,

                    content_hash:
                        sha(content)
                });

                siteDocuments++;
            }
        );
    }

    sourceSummary[site] = {
        source_files:
            files.length,

        documents:
            siteDocuments
    };
}

documents.sort(
    (a, b) =>
        a.site.localeCompare(
            b.site
        )
        || a.source_path.localeCompare(
            b.source_path
        )
        || a.chunk - b.chunk
);

const index = {
    schema_version: 1,

    authority:
        'site_editorial',

    policy: {
        technical_claims:
            'Site knowledge is editorial context only. It must not override official technical knowledge.',

        commercial_claims:
            'Site knowledge must not override WooCommerce for SKU, price, stock, URL or selected product.'
    },

    source_summary:
        sourceSummary,

    documents
};

const serialized =
    JSON.stringify(
        index,
        null,
        2
    )
    + '\n';

if (checkOnly) {
    if (
        !fs.existsSync(
            outputPath
        )
    ) {
        console.error(
            'site-knowledge.json no existe.'
        );

        process.exit(1);
    }

    const existing =
        fs.readFileSync(
            outputPath,
            'utf8'
        );

    if (existing !== serialized) {
        console.error(
            'site-knowledge.json esta desactualizado.'
        );

        process.exit(1);
    }

    console.log(
        'SITE_KNOWLEDGE_UP_TO_DATE'
    );

    process.exit(0);
}

fs.mkdirSync(
    path.dirname(
        outputPath
    ),
    {
        recursive: true
    }
);

fs.writeFileSync(
    outputPath,
    serialized,
    'utf8'
);

console.log(
    'SITE_KNOWLEDGE_BUILT'
);

for (
    const [site, summary]
    of Object.entries(
        sourceSummary
    )
) {
    console.log(
        site,
        'files='
            + summary.source_files,
        'documents='
            + summary.documents
    );
}
