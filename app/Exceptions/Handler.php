<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\News;
use App\Category;
use App\Channel;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof NotFoundHttpException)
        {

            $random_channel = Channel::inRandomOrder()->first();

            $last_news = News::where('status', '1')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();

            $category = Category::all()->toArray();

            $channels_popul = Channel::where('status', '1')
                ->where('popul', '1')
                ->with('category')
                ->orderBy('id', 'desc')
                ->get();

            return response()->view('layouts.404', compact('random_channel', 'last_news', 'category', 'channels_popul'), 404);
        }

        return parent::render($request, $exception);
    }
}
