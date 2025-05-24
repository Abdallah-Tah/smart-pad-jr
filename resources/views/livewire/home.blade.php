<div class="min-h-[calc(100vh-8rem)] flex flex-col justify-center">
    <!-- Header -->
    <div class="text-center mb-12 px-4">
        <div class="flex justify-center mb-6">
            <div class="relative">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-3xl blur-xl opacity-50 animate-pulse">
                </div>
                <div
                    class="relative w-24 h-24 rounded-3xl bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center shadow-xl shadow-indigo-500/30">
                    <span class="text-white font-bold text-5xl">K</span>
                </div>
            </div>
        </div>
        <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
            Welcome to Kids Drawing & Learning
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Choose your fun activity below!
        </p>
    </div>

    <!-- Activity Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 max-w-4xl mx-auto px-4">
        <!-- Sketch Board Card -->
        <a href="{{ route('sketch-board') }}" wire:navigate
            class="group transform hover:scale-105 transition-all duration-300">
            <div
                class="relative bg-white rounded-2xl shadow-lg overflow-hidden ring-1 ring-black/5 hover:ring-indigo-500/50 transition-shadow">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="p-8 relative">
                    <div
                        class="flex items-center justify-center h-24 w-24 rounded-2xl bg-purple-100 mx-auto mb-6 group-hover:bg-purple-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H4zm0 2h12v12H4V4zm3 3a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 text-center mb-3">Sketch Board</h2>
                    <p class="text-gray-600 text-center leading-relaxed">
                        Let your creativity flow! Draw anything you can imagine.
                    </p>
                </div>
                <div
                    class="bg-gradient-to-r from-purple-50 to-indigo-50 px-8 py-4 group-hover:from-purple-100 group-hover:to-indigo-100 transition-colors">
                    <div class="text-purple-600 text-center font-medium flex items-center justify-center space-x-2">
                        <span>Start Drawing</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>

        <!-- Math Kids Game Card -->
        <a href="{{ route('math-kids') }}" wire:navigate
            class="group transform hover:scale-105 transition-all duration-300">
            <div
                class="relative bg-white rounded-2xl shadow-lg overflow-hidden ring-1 ring-black/5 hover:ring-green-500/50 transition-shadow">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="p-8 relative">
                    <div
                        class="flex items-center justify-center h-24 w-24 rounded-2xl bg-green-100 mx-auto mb-6 group-hover:bg-green-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 text-center mb-3">Math Games</h2>
                    <p class="text-gray-600 text-center leading-relaxed">
                        Have fun while learning math with interactive games!
                    </p>
                </div>
                <div
                    class="bg-gradient-to-r from-green-50 to-emerald-50 px-8 py-4 group-hover:from-green-100 group-hover:to-emerald-100 transition-colors">
                    <div class="text-green-600 text-center font-medium flex items-center justify-center space-x-2">
                        <span>Start Playing</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
