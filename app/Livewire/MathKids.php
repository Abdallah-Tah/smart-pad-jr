<?php

namespace App\Livewire;

use Livewire\Component;

class MathKids extends Component
{
    public int $currentNumber = 0;
    public string $userAnswer = '';
    public string $message = '';
    public string $messageType = '';
    public int $score = 0;
    public string $difficulty = 'easy';
    public string $operation = 'addition';
    public array $numbers = [];

    public function mount()
    {
        $this->generateQuestion();
    }

    public function generateQuestion()
    {
        $min = $this->difficulty === 'easy' ? 1 : ($this->difficulty === 'medium' ? 10 : 50);
        $max = $this->difficulty === 'easy' ? 10 : ($this->difficulty === 'medium' ? 50 : 100);

        $this->numbers = [
            rand($min, $max),
            rand($min, $max)
        ];
        $this->userAnswer = '';
        $this->message = '';
    }

    public function checkAnswer()
    {
        $correctAnswer = match ($this->operation) {
            'addition' => $this->numbers[0] + $this->numbers[1],
            'subtraction' => $this->numbers[0] - $this->numbers[1],
            'multiplication' => $this->numbers[0] * $this->numbers[1],
            default => $this->numbers[0] + $this->numbers[1],
        };

        if ((int) $this->userAnswer === $correctAnswer) {
            $this->score++;
            $this->message = 'Correct! Well done! 🎉';
            $this->messageType = 'success';
        } else {
            $this->message = "Try again! The correct answer was {$correctAnswer}";
            $this->messageType = 'error';
        }

        $this->generateQuestion();
    }

    public function setDifficulty($level)
    {
        $this->difficulty = $level;
        $this->score = 0;
        $this->generateQuestion();
    }

    public function setOperation($op)
    {
        $this->operation = $op;
        $this->score = 0;
        $this->generateQuestion();
    }

    public function render()
    {
        return view('livewire.math-kids')->title('Math Games');
    }
}
