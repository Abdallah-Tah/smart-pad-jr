<div x-data="sketchBoard">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden {{ !$isEmbedded ? 'max-w-4xl mx-auto' : '' }}">
        <!-- Toolbar -->
        <div class="border-b border-gray-100 p-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <!-- Color Picker -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm text-gray-600">Color:</label>
                    <input type="color" class="w-8 h-8 rounded cursor-pointer" value="#000000"
                        x-on:input="color = $event.target.value" title="Choose Color">
                </div>

                <!-- Brush Size -->
                <div class="flex items-center space-x-2">
                    <label class="text-sm text-gray-600">Size:</label>
                    <input type="range" min="1" max="50" value="5" class="w-24"
                        x-on:input="lineWidth = $event.target.value" title="Brush Size">
                </div>

                <!-- Eraser -->
                <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors" x-on:click="isEraser = !isEraser"
                    x-bind:class="{ 'bg-gray-100': isEraser }" title="Toggle Eraser">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center space-x-2">
                <!-- Clear Canvas -->
                <button
                    class="px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium"
                    x-on:click="clearCanvas" title="Clear Canvas">
                    Clear
                </button>

                <!-- Save Drawing -->
                <button
                    class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 transition-colors text-sm font-medium"
                    x-on:click="saveDrawing" title="Save Drawing">
                    Save
                </button>
            </div>
        </div>

        <!-- Canvas Container -->
        <div class="relative bg-white" style="height: {{ $height }};">
            <canvas x-ref="canvas" x-init="$nextTick(() => initCanvas($refs.canvas))" class="absolute inset-0 w-full h-full cursor-crosshair"
                style="touch-action: none;">
            </canvas>
        </div>
    </div>

    <!-- Alpine.js Component Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('sketchBoard', () => ({
                canvas: null,
                ctx: null,
                isDrawing: false,
                color: '#000000',
                lineWidth: 5,
                isEraser: false,
                lastX: 0,
                lastY: 0,

                init() {
                    this.isEraser = false;
                },
                initCanvas(canvas) {
                    if (!canvas) return;
                    this.canvas = canvas;
                    this.ctx = this.canvas.getContext('2d');
                    this.resizeCanvas();
                    this.setupEventListeners();

                    // Handle window resize
                    window.addEventListener('resize', () => this.resizeCanvas());
                },

                resizeCanvas() {
                    if (!this.canvas || !this.ctx) return;
                    const container = this.canvas.parentElement;
                    this.canvas.width = container.clientWidth;
                    this.canvas.height = container.clientHeight;
                    this.ctx.lineCap = 'round';
                    this.ctx.lineJoin = 'round';
                },

                setupEventListeners() {
                    if (!this.canvas) return;

                    // Mouse events
                    this.canvas.addEventListener('mousedown', (e) => this.startDrawing(e));
                    this.canvas.addEventListener('mousemove', (e) => this.draw(e));
                    this.canvas.addEventListener('mouseup', () => this.stopDrawing());
                    this.canvas.addEventListener('mouseout', () => this.stopDrawing());

                    // Touch events
                    this.canvas.addEventListener('touchstart', (e) => {
                        e.preventDefault();
                        this.startDrawing(e.touches[0]);
                    });
                    this.canvas.addEventListener('touchmove', (e) => {
                        e.preventDefault();
                        this.draw(e.touches[0]);
                    });
                    this.canvas.addEventListener('touchend', () => this.stopDrawing());
                },

                startDrawing(e) {
                    this.isDrawing = true;
                    [this.lastX, this.lastY] = this.getCoordinates(e);
                },

                draw(e) {
                    if (!this.isDrawing || !this.ctx) return;

                    const [currentX, currentY] = this.getCoordinates(e);

                    this.ctx.beginPath();
                    this.ctx.moveTo(this.lastX, this.lastY);
                    this.ctx.lineTo(currentX, currentY);
                    this.ctx.strokeStyle = this.isEraser ? '#FFFFFF' : this.color;
                    this.ctx.lineWidth = this.lineWidth;
                    this.ctx.stroke();
                    this.ctx.closePath();

                    [this.lastX, this.lastY] = [currentX, currentY];
                },

                stopDrawing() {
                    this.isDrawing = false;
                },

                getCoordinates(e) {
                    const rect = this.canvas.getBoundingClientRect();
                    const x = (e.clientX || e.x) - rect.left;
                    const y = (e.clientY || e.y) - rect.top;
                    return [x, y];
                },

                clearCanvas() {
                    if (!this.ctx || !this.canvas) return;
                    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
                },

                saveDrawing() {
                    if (!this.canvas) return;
                    const link = document.createElement('a');
                    link.download = 'sketch.png';
                    link.href = this.canvas.toDataURL();
                    link.click();
                }
            }));
        });
    </script>
</div>
