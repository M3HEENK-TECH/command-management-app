<?php


namespace App\Http\Controllers\Resources;


use App\Http\Controllers\Controller;
use App\Models\errorMessage;
use App\Models\User;
use Illuminate\Http\Request;

class MessagingController extends Controller
{

    public function index(){
        $active_user = User::query()->where("role","admin")->first();
        if ($active_user->id == auth()->id() ){
            $active_user = User::query()->where("role","cashier")->first();
        }
        $auth_id = auth()->id();
        $user_id = $active_user->id;
        $messages = errorMessage::query()
            ->whereRaw("(
                    (user_id = $auth_id AND target_user_id = $user_id) OR
                    (target_user_id = $auth_id AND user_id = $user_id) )")
            ->oldest("created_at")
            ->get();
        return view("resources.messaging.index",[
            "users" => User::query()
            ->where("id","!=",$auth_id)
            ->where("id","!=",$user_id)
            ->get()
            ,
            "messages" => $messages,
            "active_user" => $active_user,
        ]);
    }
    public function sendErrorMessage(Request $request){
        $this->validate($request,[
            "message" => "required",
            "target_user_id" => "required",
        ]);
        $request->merge(["user_id" => auth()->id() ]);
        errorMessage::query()->create($request->all());
        return back()->withSuccess("Envoie reussie");
    }
    public function show(User $user){
        $active_user = $user;
        $auth_id = auth()->id();
        $user_id = $active_user->id;
        return view("resources.messaging.index",[
            "users" => User::query()
                ->where("id","!=",$auth_id)
                ->where("id","!=",$user_id)
                ->get()
            ,
            "messages" => errorMessage::query()
                ->whereRaw("(
                    (user_id = $auth_id AND target_user_id = $user_id) OR
                    (target_user_id = $auth_id AND user_id = $user_id) )")
                ->oldest("created_at")
                ->get(),
            "active_user" => $active_user,
        ]);
    }

}
