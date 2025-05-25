<div x-data="sketchBoard" class="w-full {{ !$isEmbedded ? 'max-w-6xl mx-auto px-1 sm:px-4' : '' }}">
    <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden border-2 sm:border-4 border-yellow-200">
        <!-- Fun Header -->
        <div class="bg-gradient-to-r from-purple-400 via-pink-400 to-yellow-400 p-2 sm:p-4">
            <h2
                class="text-center text-white font-bold text-base sm:text-2xl drop-shadow-lg flex items-center justify-center gap-2">
                <span class="animate-bounce" style="animation-delay: 0.2s">🎨</span>
                <span>Magic Drawing Board</span>
                <span class="animate-bounce" style="animation-delay: 0s">✨</span>
            </h2>
        </div>

        <!-- Toolbar -->
        <div class="border-b border-yellow-200 p-1.5 sm:p-4 bg-gradient-to-r from-blue-50 to-purple-50">
            <!-- Mobile Layout: Stack items vertically on small screens -->
            <div class="grid grid-cols-1 gap-3">
                <!-- Drawing Tools -->
                <div class="grid grid-cols-1 gap-3">
                    <!-- Color Palette -->
                    <div class="w-full sm:w-auto grid grid-cols-1 gap-2">
                        <span class="text-sm sm:text-base font-semibold text-purple-700 text-center sm:text-left">
                            Colors</span>
                        <!-- Quick Color Buttons -->
                        <div class="grid grid-cols-4 xs:grid-cols-8 sm:flex gap-1 place-items-center">
                            <button @click="color = '#FF6B6B'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-red-400 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#FF6B6B' }" title="Red"></button>
                            <button @click="color = '#4ECDC4'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-teal-400 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#4ECDC4' }" title="Teal"></button>
                            <button @click="color = '#45B7D1'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-blue-400 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#45B7D1' }" title="Blue"></button>
                            <button @click="color = '#96CEB4'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-green-400 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#96CEB4' }" title="Green"></button>
                            <button @click="color = '#FECA57'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-yellow-400 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#FECA57' }" title="Yellow"></button>
                            <button @click="color = '#FF9FF3'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-pink-400 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#FF9FF3' }" title="Pink"></button>
                            <button @click="color = '#A55EEA'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-purple-400 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#A55EEA' }" title="Purple"></button>
                            <button @click="color = '#000000'; isEraser = false"
                                class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg bg-gray-800 hover:scale-110 transition-transform"
                                :class="{ 'ring-4 ring-blue-300': color === '#000000' }" title="Black"></button>
                        </div>
                        <!-- Custom Color Picker -->
                        <input type="color"
                            class="w-8 h-8 sm:w-10 sm:h-10 rounded-full border-2 border-white shadow-lg cursor-pointer hover:scale-110 transition-transform"
                            x-model="color" @input="isEraser = false" title="Pick Any Color!">
                    </div>

                    <!-- Brush Size -->
                    <div class="w-full sm:w-auto grid grid-cols-1 gap-1">
                        <span class="text-sm sm:text-base font-semibold text-purple-700 text-center sm:text-left">✏️
                            Size</span>
                        <div class="flex items-center justify-center space-x-2 bg-white/50 rounded-lg px-2 py-1">
                            <span class="text-xs text-gray-600 whitespace-nowrap">Thin</span>
                            <input type="range" min="2" max="30" value="8"
                                class="w-24 sm:w-32 accent-purple-500 h-8 touch-manipulation" x-model="lineWidth"
                                title="Brush Size">
                            <span class="text-xs text-gray-600 whitespace-nowrap">Thick</span>
                        </div>
                        <div
                            class="w-6 h-6 border-2 border-purple-300 rounded-full flex items-center justify-center bg-white">
                            <div class="rounded-full bg-purple-500 transition-all duration-200"
                                :style="`width: ${Math.min(lineWidth, 20)}px; height: ${Math.min(lineWidth, 20)}px`">
                            </div>
                        </div>
                    </div>

                    <!-- Eraser -->
                    <button
                        class="flex items-center space-x-1 px-3 py-2 rounded-xl font-semibold transition-all transform hover:scale-105 active:scale-95"
                        x-on:click="isEraser = !isEraser"
                        :class="isEraser ? 'bg-orange-200 text-orange-800 shadow-lg' :
                            'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                        title="Magic Eraser">
                        <span class="text-lg">🧽</span>
                        <span class="text-sm sm:text-base">Eraser</span>
                    </button>
                </div>

                <!-- Action Buttons - Optimized for Mobile -->
                <div class="flex flex-wrap items-center justify-center gap-2">
                    <!-- Clear Canvas -->
                    <button
                        class="flex items-center space-x-1 px-2 sm:px-4 py-1.5 sm:py-2 bg-red-100 text-red-700 rounded-xl hover:bg-red-200 transition-all transform hover:scale-105 active:scale-95 text-sm sm:text-base shadow-lg"
                        x-on:click="clearCanvas" title="Clear Everything">
                        <span class="text-base sm:text-lg">🗑️</span>
                        <span class="hidden xs:inline">Clear</span>
                    </button>

                    <!-- Save Drawing -->
                    <button
                        class="flex items-center space-x-1 px-2 sm:px-4 py-1.5 sm:py-2 bg-green-100 text-green-700 rounded-xl hover:bg-green-200 transition-all transform hover:scale-105 active:scale-95 text-sm sm:text-base shadow-lg"
                        x-on:click="saveDrawing" title="Save Your Masterpiece">
                        <span class="text-base sm:text-lg">💾</span>
                        <span class="hidden xs:inline">Save</span>
                    </button>

                    <!-- Undo Button -->
                    <button
                        class="flex items-center space-x-1 px-2 sm:px-4 py-1.5 sm:py-2 bg-blue-100 text-blue-700 rounded-xl hover:bg-blue-200 transition-all transform hover:scale-105 active:scale-95 text-sm sm:text-base shadow-lg"
                        x-on:click="undoLastStroke" title="Undo Last Drawing">
                        <span class="text-base sm:text-lg">↺</span>
                        <span class="hidden xs:inline">Undo</span>
                    </button>
                </div>
            </div>
        </div> <!-- Canvas Container with Adjustable Height -->
        <div class="relative bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 p-2 sm:p-4">
            <!-- Canvas Area -->
            <div class="relative bg-white rounded-xl border-4 border-dashed border-purple-200 overflow-hidden shadow-inner"
                style="height: {{ $isEmbedded ? $height : 'calc(100vh - 24rem)' }}; min-height: 300px; max-height: {{ $isEmbedded ? $height : '800px' }}">

                <!-- Fun Corner Decorations -->
                <div class="absolute top-2 left-2 text-2xl animate-bounce" style="animation-delay: 0s;">🌟</div>
                <div class="absolute top-2 right-2 text-2xl animate-bounce" style="animation-delay: 0.5s;">🎨</div>
                <div class="absolute bottom-2 left-2 text-2xl animate-bounce" style="animation-delay: 1s;">✨</div>
                <div class="absolute bottom-2 right-2 text-2xl animate-bounce" style="animation-delay: 1.5s;">🖍️</div>

                <!-- Drawing Canvas -->
                <canvas x-ref="canvas" x-init="$nextTick(() => initCanvas($refs.canvas))" class="absolute inset-0 w-full h-full"
                    :class="isEraser ? 'cursor-crosshair' : 'cursor-crosshair'" style="touch-action: none;">
                </canvas>

                <!-- Helpful Instructions for Kids -->
                <div x-show="!hasDrawn" class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="text-center p-4 bg-white/80 rounded-xl border-2 border-purple-200 shadow-lg max-w-xs">
                        <p class="text-lg font-bold text-purple-700 mb-2">🎯 Start Drawing!</p>
                        <p class="text-sm text-gray-600">
                            Pick a color and start creating your masterpiece!
                        </p>
                        <div class="mt-2 text-xs text-gray-500">
                            👆 Tap or click to draw
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fun Drawing Stats - More Compact for Mobile -->
            <div class="mt-2 sm:mt-3 text-center overflow-x-auto">
                <div
                    class="inline-flex flex-wrap justify-center sm:flex-nowrap items-center gap-2 sm:gap-4 bg-white/80 rounded-full px-3 py-1.5 sm:px-4 sm:py-2 border-2 border-purple-200 shadow-sm">
                    <div class="flex items-center gap-1">
                        <span class="text-sm">🎨</span>
                        <div class="w-4 h-4 rounded-full border-2 border-white shadow-sm"
                            :style="`background-color: ${color}`"></div>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="text-sm">✏️</span>
                        <span class="text-xs font-bold text-purple-600" x-text="lineWidth + 'px'"></span>
                    </div>
                    <div class="flex items-center gap-1" x-show="isEraser">
                        <span class="text-sm">🧽</span>
                        <span class="text-xs font-medium text-orange-600">Eraser</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
