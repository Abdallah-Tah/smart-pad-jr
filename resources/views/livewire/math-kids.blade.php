<div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Math Whiz</h1>
            <p class="text-xl text-gray-600">Practice math and draw your solutions!</p>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-7xl mx-auto">
            <!-- Left Column - Math Problem -->
            <div class="space-y-6">
                <!-- Score Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-gray-900">Score: {{ $score }}</h2>
                        <span class="px-4 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm font-medium">
                            {{ ucfirst($difficulty) }} Mode
                        </span>
                    </div>

                    <!-- Operation Selection -->
                    <div class="flex gap-2 mb-6">
                        <button wire:click="setOperation('addition')"
                            class="flex-1 px-4 py-2 rounded-lg {{ $operation === 'addition' ? 'bg-indigo-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors">
                            +
                        </button>
                        <button wire:click="setOperation('subtraction')"
                            class="flex-1 px-4 py-2 rounded-lg {{ $operation === 'subtraction' ? 'bg-indigo-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors">
                            -
                        </button>
                        <button wire:click="setOperation('multiplication')"
                            class="flex-1 px-4 py-2 rounded-lg {{ $operation === 'multiplication' ? 'bg-indigo-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors">
                            ×
                        </button>
                    </div>

                    <!-- Difficulty Selection -->
                    <div class="flex gap-2 mb-6">
                        <button wire:click="setDifficulty('easy')"
                            class="flex-1 px-4 py-2 rounded-lg {{ $difficulty === 'easy' ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors">
                            Easy
                        </button>
                        <button wire:click="setDifficulty('medium')"
                            class="flex-1 px-4 py-2 rounded-lg {{ $difficulty === 'medium' ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors">
                            Medium
                        </button>
                        <button wire:click="setDifficulty('hard')"
                            class="flex-1 px-4 py-2 rounded-lg {{ $difficulty === 'hard' ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }} transition-colors">
                            Hard
                        </button>
                    </div>

                    <!-- Math Problem -->
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-8 text-center mb-6">
                        <div class="text-4xl font-bold text-gray-900 mb-6">
                            {{ $numbers[0] }}
                            <span class="mx-2">
                                {{ match ($operation) {
                                    'addition' => '+',
                                    'subtraction' => '-',
                                    'multiplication' => '×',
                                    default => '+',
                                } }}
                            </span>
                            {{ $numbers[1] }} = ?
                        </div>
                        <input type="number" wire:model="userAnswer" wire:keydown.enter="checkAnswer"
                            class="w-32 px-4 py-2 text-2xl text-center border-2 border-indigo-200 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all"
                            placeholder="Answer">
                    </div>

                    <!-- Submit Button -->
                    <button wire:click="checkAnswer"
                        class="w-full py-3 bg-indigo-500 hover:bg-indigo-600 text-white rounded-lg transition-colors">
                        Check Answer
                    </button>

                    <!-- Message -->
                    @if ($message)
                        <div
                            class="mt-4 p-4 rounded-lg {{ $messageType === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $message }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column - Sketch Board -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <livewire:sketch-board :is-embedded="true" :canvas-id="'math-sketch'" :height="'600px'" />
            </div>
        </div>
    </div>
</div>
