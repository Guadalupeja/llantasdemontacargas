@props([
    'products' => [],
])

<div
    id="forklift-chatbot"
    x-data="forkliftChatbot(@js($products), '{{ csrf_token() }}')"
    x-init="init()"
    class="fixed bottom-5 right-5 z-[90]"
>
    <button
        x-show="!open"
        @click="open = true"
        class="flex items-center gap-3 rounded-full bg-[#e76a3e] px-5 py-4 text-sm font-semibold text-white shadow-[0_12px_30px_rgba(0,0,0,0.28)] transition hover:opacity-90"
    >
        <span>Encuentra tu llanta</span>
    </button>

    <div
        x-show="open"
        x-transition
        class="w-[92vw] max-w-[420px] overflow-hidden rounded-[24px] border border-black/10 bg-white shadow-[0_20px_70px_rgba(0,0,0,0.28)]"
    >
        <div class="flex items-center justify-between bg-black px-5 py-4 text-white">
            <div>
                <p class="text-[11px] uppercase tracking-[0.2em] text-[#e76a3e]">Asistente</p>
                <h3 class="text-lg font-bold">Llantas para montacargas</h3>
            </div>

            <button @click="resetAndClose()" class="text-white/80 hover:text-white">✕</button>
        </div>

        <div class="max-h-[70vh] overflow-y-auto px-5 py-4">
            <template x-for="message in messages" :key="message.id">
                <div class="mb-4">
                    <template x-if="message.role === 'bot'">
                        <div class="rounded-2xl bg-slate-100 px-4 py-3 text-sm text-slate-800" x-text="message.text"></div>
                    </template>

                    <template x-if="message.role === 'user'">
                        <div class="ml-auto max-w-[85%] rounded-2xl bg-[#e76a3e] px-4 py-3 text-sm text-white" x-text="message.text"></div>
                    </template>
                </div>
            </template>

            <template x-if="step !== 'results' && currentOptions.length">
                <div class="mt-4 grid grid-cols-1 gap-2">
                    <template x-for="option in currentOptions" :key="option.value">
                        <button
                            @click="selectOption(option)"
                            class="rounded-xl border border-slate-200 px-4 py-3 text-left text-sm font-medium text-slate-800 transition hover:border-[#e76a3e] hover:bg-[#fff4ef]"
                            x-text="option.label"
                        ></button>
                    </template>
                </div>
            </template>

            <template x-if="showSpecialistForm">
                <form @submit.prevent="submitSpecialistForm()" class="mt-4 space-y-3">
                    <input
                        x-model="specialistForm.name"
                        type="text"
                        placeholder="Nombre"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <input
                        x-model="specialistForm.company"
                        type="text"
                        placeholder="Empresa"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <input
                        x-model="specialistForm.phone"
                        type="text"
                        placeholder="Teléfono"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <input
                        x-model="specialistForm.email"
                        type="email"
                        placeholder="Correo"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    >

                    <textarea
                        x-model="specialistForm.message"
                        rows="4"
                        placeholder="Cuéntanos qué tipo de equipo tienes, qué aplicación necesitas o cualquier dato que tengas"
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#e76a3e]"
                    ></textarea>

                    <button
                        type="submit"
                        :disabled="isSubmitting"
                        class="w-full rounded-xl bg-[#e76a3e] px-4 py-3 text-sm font-semibold text-white transition hover:opacity-90 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        <span x-show="!isSubmitting">Enviar solicitud</span>
                        <span x-show="isSubmitting">Enviando...</span>
                    </button>
                </form>
            </template>

            <template x-if="step === 'results'">
                <div class="mt-4 space-y-3">
                    <template x-for="item in results" :key="item.id">
                        <a
                            :href="item.url"
                            target="_blank"
                            rel="noopener"
                            class="flex gap-3 rounded-2xl border border-slate-200 p-3 transition hover:border-[#e76a3e] hover:shadow-sm"
                        >
                            <img
                                :src="item.image || fallbackImage"
                                :alt="item.title"
                                class="h-20 w-20 rounded-xl object-cover bg-slate-100"
                            >

                            <div class="min-w-0 flex-1">
                                <p
                                    class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500"
                                    x-text="item.measure"
                                ></p>

                                <h4
                                    class="mt-1 line-clamp-2 text-sm font-bold text-slate-900"
                                    x-text="item.title"
                                ></h4>

                                <p
                                    class="mt-2 text-sm font-extrabold text-[#e76a3e]"
                                    x-text="item.price_label || 'Consultar precio'"
                                ></p>
                            </div>
                        </a>
                    </template>

                    <div class="flex flex-wrap gap-2 pt-2">
                        <button
                            @click="restart()"
                            class="rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100"
                        >
                            Empezar de nuevo
                        </button>

                        <a
                            href="#T7"
                            class="rounded-full bg-[#e76a3e] px-4 py-2 text-sm font-semibold text-white transition hover:opacity-90"
                        >
                            Hablar con asesor
                        </a>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>