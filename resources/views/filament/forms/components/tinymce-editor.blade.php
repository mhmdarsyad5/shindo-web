<x-filament-forms::field-wrapper :field="$field">
    <div
        x-data="{
            state: $wire.$entangle('{{ $getStatePath() }}'),
            editor: null,
            initEditor() {
                const loadTinyMce = () => {
                    return new Promise((resolve, reject) => {
                        if (window.tinymce) {
                            return resolve(window.tinymce);
                        }

                        const existingScript = document.getElementById('tinymce-cdn-script');
                        if (existingScript) {
                            existingScript.addEventListener('load', () => resolve(window.tinymce));
                            existingScript.addEventListener('error', reject);
                            return;
                        }

                        const script = document.createElement('script');
                        script.id = 'tinymce-cdn-script';
                        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js';
                        script.referrerPolicy = 'origin';
                        script.onload = () => resolve(window.tinymce);
                        script.onerror = reject;
                        document.head.appendChild(script);
                    });
                };

                loadTinyMce().then((tinymce) => {
                    const isDark = document.documentElement.classList.contains('dark');
                    const targetEl = this.$refs.tinymceTextarea;

                    tinymce.init({
                        target: targetEl,
                        height: {{ $getMinHeight() }},
                        menubar: 'file edit view insert format tools table',
                        plugins: [
                            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                            'insertdatetime', 'media', 'table', 'wordcount'
                        ],
                        toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | code fullscreen preview',
                        skin: isDark ? 'oxide-dark' : 'oxide',
                        content_css: isDark ? 'dark' : 'default',
                        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; padding: 12px; }',
                        branding: false,
                        promotion: false,
                        setup: (editor) => {
                            this.editor = editor;

                            editor.on('init', () => {
                                if (this.state) {
                                    editor.setContent(this.state);
                                }
                            });

                            const updateLivewire = () => {
                                const newContent = editor.getContent();
                                if (this.state !== newContent) {
                                    this.state = newContent;
                                }
                            };

                            editor.on('change keyup paste NodeChange Undo Redo', updateLivewire);
                        }
                    });

                    this.$watch('state', (val) => {
                        if (this.editor && this.editor.initialized) {
                            const currentVal = this.editor.getContent();
                            if (val !== currentVal) {
                                this.editor.setContent(val || '');
                            }
                        }
                    });
                }).catch((err) => {
                    console.error('Failed to load TinyMCE:', err);
                });
            }
        }"
        x-init="initEditor()"
        wire:ignore
        class="w-full rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-xs"
    >
        <textarea x-ref="tinymceTextarea" id="tinymce-{{ str_replace('.', '-', $getStatePath()) }}" class="hidden"></textarea>
    </div>
</x-filament-forms::field-wrapper>
