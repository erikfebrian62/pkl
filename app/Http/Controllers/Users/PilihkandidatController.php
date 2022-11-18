<?php

namespace App\Http\Controllers\Users;

use App\Models\Vote;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PilihkandidatController extends Controller
{
    public function voting()
    {
        $candidate = Candidate::with(['visi','misi'])->get();
        $votes = Vote::where('user_id', Auth::user()->id)->count();
        return view('user.pilihkandidat', compact('candidate', 'votes'));
    }

    public function vote($id)
    {
        $votes = Vote::where('user_id', Auth::user()->id)->count();
        if($votes < 1){
            Vote::create([
                'user_id' => Auth::user()->id,
                'candidate_id' => $id
            ]);
            return redirect(route('user.informasi-suara'));
        }
        else{
           return redirect(route('user.pilih-kandidat'))->with('danger','Anda Telah Voting.!');
        }
           return redirect(route('user.pilih-kandidat'))->with('danger','Anda Sudah Voting.!');
    }

    public function suara()
    {
        $data = [
            'candidate' => Candidate::select('id')->withCount('vote')->get(),
            'jmlhpeserta' => User::where('role', 'user')->count(),
        ];
        return response()->json($data);
    }
 }
