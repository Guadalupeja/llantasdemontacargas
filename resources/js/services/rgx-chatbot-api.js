export async function sendRgxChatMessage({
    message,
    history = [],
    csrfToken = '',
}) {
    const response = await fetch('/chatbot/message', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            message,
            history,
        }),
    });

    let data = {};

    try {
        data = await response.json();
    } catch {
        throw new Error(
            'El servidor devolvió una respuesta inválida.'
        );
    }

    if (! response.ok) {
        if (data.errors) {
            const firstError = Object.values(data.errors)?.[0]?.[0];

            throw new Error(
                firstError
                || data.message
                || 'No fue posible enviar el mensaje.'
            );
        }

        throw new Error(
            data.error
            || data.message
            || 'El asistente no pudo responder.'
        );
    }

    if (! data.answer) {
        throw new Error(
            'El asistente devolvió una respuesta vacía.'
        );
    }

    return {
        answer: data.answer,
        product: data.product ?? null,
    };
}