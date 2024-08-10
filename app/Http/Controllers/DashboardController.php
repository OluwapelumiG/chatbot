<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Models\Book;
use App\Models\Field;
use App\Models\Hall;

class DashboardController extends Controller
{
    //

    public function chat()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            if (strtolower($message) == 'hi') {
                $botman->startConversation(new GreetConversation());
            } else {
                $botman->reply('Please start by saying "hi".');
            }
        });

        $botman->listen();
    }
}

class GreetConversation extends Conversation
{
    protected $name;

    public function run()
    {
        $this->askName();
    }

    public function askName()
    {
        $this->ask('Hello! What is your name?', function (Answer $answer) {
            $this->name = $answer->getText();
            $this->say('Nice to meet you ' . $this->name);

            $this->askBookDetails();
        });
    }

    public function askBookDetails()
    {
        $this->ask('What book are you looking for?', function (Answer $answer) {
            $query = $answer->getText();

            // Regular expression to remove common words and phrases
            $cleanedQuery = preg_replace('/\b(i\'m|am|looking|for|do|you|have|is|what|the|a|an|book|can|could|please|tell|me|about|find|search|it\'s|it|that|this|in|on|with|by|any|some|know)\b/i', '', $query);

            // Trim any extra spaces
            $cleanedQuery = trim(preg_replace('/\s+/', ' ', $cleanedQuery));

            $books = $this->searchBooks($cleanedQuery);

            if ($books->count() > 1) {
                $this->askWhichBook($books);
            } elseif ($books->count() == 1) {
                $book = $books->first();
                $this->say("The book you're looking for is \"{$book->title}\", by {$book->author}, in {$book->year}.\n The location is \"{$book->hall->name}, {$book->hall->description}\".");
            } else {
                $this->say('No books found matching your query.');
            }
        });
    }

    public function askWhichBook($books)
    {
        $options = [];
        foreach ($books as $index => $book) {
            $options[] = Button::create("{$book->title} by {$book->author}")->value($index);
        }

        $question = Question::create('Multiple books found, please select one:')
            ->addButtons($options);

        $this->ask($question, function (Answer $answer) use ($books) {
            $selectedBook = $books[$answer->getValue()];
            $this->say("The book you're looking for is \"{$selectedBook->title}\", by {$selectedBook->author}, in {$selectedBook->year}.\n The location is \"{$selectedBook->hall->name}, {$selectedBook->hall->description}\".");
        });
    }

    protected function searchBooks($query)
    {
        // return Book::where('title', 'like', "%{$query}%")
        //     ->orWhere('author', 'like', "%{$query}%")
        //     ->orWhere('year', 'like', "%{$query}%")
        //     ->orWhereHas('field', function ($q) use ($query) {
        //         $q->where('discipline', 'like', "%{$query}%")
        //             ->orWhere('code', 'like', "%{$query}%");
        //     })
        //     ->orWhereHas('hall', function ($q) use ($query) {
        //         $q->where('name', 'like', "%{$query}%")
        //             ->orWhere('description', 'like', "%{$query}%");
        //     })
        //     ->get();

        return Book::search($query)->get();
    }
}
