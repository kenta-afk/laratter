<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tweet;


class TweetLikeController extends Controller

{

  public function index()
  {
    // 🔽 liked のデータも合わせて取得するよう修正
    $tweets = Tweet::with(['user', 'liked'])->latest()->get();
    // dd($tweets);
    return view('tweets.index', compact('tweets'));
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Tweet $tweet)
  {
    $tweet->liked()->attach(auth()->id());
    return back();
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tweet $tweet)
  {
    $tweet->liked()->detach(auth()->id());
    return back();
  }
}

