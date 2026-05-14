@props([
    'products' => [],
])

<div
    id="forklift-chatbot"
    x-data="forkliftChatbot(@js($products), '{{ csrf_token() }}')"
    x-init="init()"
    class="fixed bottom-5 right-5 z-[9999]"
>
    {{-- Botón flotante igual al estilo de llantasparaminicargadores --}}
    <div x-show="!open" x-transition class="flex items-center gap-3">
        <button
            type="button"
            @click="open = true"
            class="flex items-center gap-3 rounded-full bg-white px-4 py-3 shadow-[0_10px_30px_rgba(0,0,0,0.16)] ring-1 ring-black/5 transition hover:-translate-y-[1px] hover:shadow-[0_14px_34px_rgba(0,0,0,0.22)]"
        >
            <span class="text-sm font-semibold text-slate-700">
                ¿Qué tipo de llanta estás buscando?
            </span>

            <span class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-black">
                <img
                    src="{{ asset('img/logo-ruguex.png') }}"
                    alt="RUGUEX"
                    class="h-8 w-8 object-contain"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='<span class=&quot;text-[10px] font-bold tracking-wide text-[#e76a3e]&quot;>RUGUEX</span>';"
                >
            </span>
        </button>
    </div>

    {{-- Ventana del chat --}}
    <div
        x-show="open"
        x-transition
        class="w-[370px] max-w-[92vw] overflow-hidden rounded-[24px] bg-[#efefef] shadow-[0_24px_70px_rgba(0,0,0,0.28)]"
    >
        {{-- Header rojo como el otro sitio --}}
        <div class="flex items-start justify-between bg-[#b00000] px-4 py-3 text-white">
            <div class="flex items-start gap-3">
                <div class="flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-black">
                    <img
                        src="{{ asset('img/logo-ruguex.png') }}"
                        alt="RUGUEX"
                        class="h-8 w-8 object-contain"
                        onerror="this.style.display='none'; this.parentNode.innerHTML='<span class=&quot;text-[10px] font-bold tracking-wide text-[#e76a3e]&quot;>RUGUEX</span>';"
                    >
                </div>

                <div>
                    <h3 class="text-[15px] font-bold leading-tight">Agente virtual Ruguex</h3>
                    <div class="mt-1 flex items-center gap-2 text-sm">
                        <span class="inline-block h-3 w-3 rounded-full bg-[#25D366]"></span>
                        <span>En línea</span>
                    </div>
                </div>
            </div>

            <button
                type="button"
                @click="resetAndClose()"
                class="text-[36px] leading-none text-white/90 transition hover:text-white"
            >
                ×
            </button>
        </div>

        {{-- Body --}}
        <div class="max-h-[68vh] overflow-y-auto px-4 py-4">
            <template x-for="message in messages" :key="message.id">
                <div class="mb-4">
                    {{-- Bot --}}
                    <template x-if="message.role === 'bot'">
                        <div class="flex items-end gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center overflow-hidden rounded-full bg-black">
                                <img
                                    src="{{ asset('img/logo-ruguex.png') }}"
                                    alt="RUGUEX"
                                    class="h-7 w-7 object-contain"
                                    onerror="this.style.display='none'; this.parentNode.innerHTML='<span class=&quot;text-[9px] font-bold tracking-wide text-[#e76a3e]&quot;>RUGUEX</span>';"
                                >
                            </div>

                            <div class="max-w-[260px] rounded-[18px] bg-[#f6f6f6] px-4 py-4 text-[16px] font-medium leading-8 text-slate-700 shadow-sm">
                                <span x-text="message.text"></span>
                            </div>
                        </div>
                    </template>

                    {{-- Usuario --}}
                    <template x-if="message.role === 'user'">
                        <div class="flex justify-end">
                            <div class="max-w-[260px] rounded-[18px] bg-[#e76a3e] px-4 py-3 text-sm font-medium text-white shadow-sm">
                                <span x-text="message.text"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- Opciones --}}
            <template x-if="step !== 'results' && currentOptions.length">
                <div class="mt-2 space-y-3">
                    <template x-for="option in currentOptions" :key="option.value">
                        <button
                            type="button"
                            @click="selectOption(option)"
                            class="w-full rounded-full border border-[#cfd8e3] bg-white px-4 py-3 text-center text-[15px] font-semibold text-slate-700 transition hover:border-[#e76a3e] hover:bg-[#fff4ef]"
                            x-text="option.label"
                        ></button>
                    </template>
                </div>
            </template>

            {{-- Formulario --}}
            <template x-if="showSpecialistForm">
                <form @submit.prevent="submitSpecialistForm()" class="mt-4 space-y-3">
                    <input
                        x-model="specialistForm.name"
                        name="name"
                        type="text"
                        placeholder="Nombre"
                        autocomplete="name"
                        class="w-full rounded-[16px] border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <input
                        x-model="specialistForm.company"
                        name="company"
                        type="text"
                        placeholder="Empresa"
                        autocomplete="organization"
                        class="w-full rounded-[16px] border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <input
                        x-model="specialistForm.phone"
                        name="phone"
                        type="text"
                        placeholder="Teléfono"
                        autocomplete="tel"
                        class="w-full rounded-[16px] border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <input
                        x-model="specialistForm.email"
                        name="email"
                        type="email"
                        placeholder="Correo"
                        autocomplete="email"
                        class="w-full rounded-[16px] border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <textarea
                        x-model="specialistForm.message"
                        name="message"
                        rows="4"
                        placeholder="Cuéntanos la medida, el tipo de montacargas o el uso que le darás y te ayudamos a identificar la opción adecuada."
                        class="w-full rounded-[16px] border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    ></textarea>

                    <button
                        type="submit"
                        :disabled="isSubmitting"
                        class="w-full rounded-[16px] bg-[#e76a3e] px-4 py-3 text-sm font-semibold text-white transition hover:opacity-90 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        <span x-show="!isSubmitting">Solicitar asesoría</span>
                        <span x-show="isSubmitting">Enviando...</span>
                    </button>
                </form>
            </template>

            {{-- Resultados --}}
            <template x-if="step === 'results'">
                <div class="mt-4 space-y-3">
                    <template x-for="item in results" :key="item.id">
                        <a
                            :href="item.url"
                            target="_blank"
                            rel="noopener"
                            class="flex gap-3 rounded-[18px] bg-white p-3 shadow-sm transition hover:shadow-md"
                        >
                            <img
                                :src="item.image || fallbackImage"
                                :alt="item.title"
                                class="h-20 w-20 rounded-[14px] object-cover bg-slate-100"
                            >

                            <div class="min-w-0 flex-1">
                                <p
                                    class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500"
                                    x-text="item.measure"
                                ></p>

                                <h4
                                    class="mt-1 line-clamp-3 text-sm font-bold leading-6 text-slate-900"
                                    x-text="item.title"
                                ></h4>

                                <p
                                    class="mt-2 text-base font-extrabold text-[#e76a3e]"
                                    x-text="item.price_label || 'Consultar precio'"
                                ></p>

                                <span class="mt-2 inline-block text-sm font-semibold text-slate-700">
                                    Ver producto →
                                </span>
                            </div>
                        </a>
                    </template>

                    <div class="flex flex-wrap gap-2 pt-2">
                        <button
                            type="button"
                            @click="restart()"
                            class="rounded-full border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100"
                        >
                            Empezar de nuevo
                        </button>

                        <button
                            type="button"
                            @click="askSpecialistHelp('Si necesitas apoyo adicional, un asesor puede ayudarte a elegir la opción correcta.')"
                            class="rounded-full bg-[#e76a3e] px-4 py-2 text-sm font-semibold text-white transition hover:opacity-90"
                        >
                            Hablar con un asesor
                        </button>

                        <template x-if="isBusinessHours()">
                            <button
                                type="button"
                                @click="window.open(getWhatsAppUrl(), '_blank', 'noopener')"
                                class="rounded-full border border-[#e76a3e] bg-white px-4 py-2 text-sm font-semibold text-[#e76a3e] transition hover:bg-[#fff4ef]"
                            >
                                Pregúntanos por WhatsApp
                            </button>
                        </template>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>