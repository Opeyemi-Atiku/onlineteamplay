<!-- content title -->
<script src="/js/shout.js"></script>
<div class="main-content-title">
    <h3><i class="fa fa-volume-up"></i> SHOUTBOX</h3>
</div>
<div class="row" style="padding-left: 10px;">

    <div class="col-md-12" id="shoutbox" style="height: 270px; overflow-y: auto; margin-top: 30px;">
        @foreach($shouts as $shout)
            @if($shout->user->role == 'admin')
                <p class="sentence"><small><a href="/user/{{ $shout->user->username }}" style="color: red;">{{ $shout->user->username }}:</a></small> &nbsp;&nbsp;&nbsp; {{ $shout->shout }}<hr></p>
            @endif

            @if($shout->user->role == 'moderator')
                <p class="sentence"><small><a href="/user/{{ $shout->user->username }}" style="color: purple;">{{ $shout->user->username }}:</a></small> &nbsp;&nbsp;&nbsp; {{ $shout->shout }}<hr></p>
            @endif
                
            @if($shout->user->role == 'manager')
                <p class="sentence"><small><a href="/user/{{ $shout->user->username }}" style="color: white;">{{ $shout->user->username }}:</a></small> &nbsp;&nbsp;&nbsp; {{ $shout->shout }}<hr></p>
            @endif

            @if($shout->user->role == 'user')
                <p class="sentence"><small><a href="/user/{{ $shout->user->username }}" style="color: white;">{{ $shout->user->username }}:</a></small> &nbsp;&nbsp;&nbsp; {{ $shout->shout }}<hr></p> 
            @endif
        @endforeach

    </div>
    
</div>
<div class="row" style="margin-top: 40px; text-align: center;">
    <h3>
        @if(!Auth::guest())
            <input type="text" placeholder="type here.." id="shoutArea" style="font-size: 12px;
            padding: 2%;
            width: 90%;
            margin-bottom: 15px;
            color: #ccc;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            background-color: #26262f;
            -webkit-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
            -moz-box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
            box-shadow: 0 1px rgba(255, 255, 255, .1), inset 0 1px 2px rgba(0, 0, 0, .6);
            border: 1px solid rgba(0, 0, 0, .9);
            "  onkeyup="shout(event, '{{ Auth::user()->username }}', '{{ Auth::user()->role }}', {{Auth::user()->subscribed}})">
            @if(Auth::user()->subscribed == false)
                <form method="POST" id="payment-form" action="{!! URL::to('paypal') !!}">
                    {{ csrf_field() }}

                    <input type="hidden" name="amount" value="2.5">
                    <input type="hidden" name="id" value="{{Auth::User()->id}}">
                    <button onclick="event.preventDefault();
                    document.getElementById('payment-form').submit();" class="btn btn-warning" style="background: orange; font-size: 17px;" title="Click here to update to the gold plan, this allows you to post emojis into the shoutbox">
                        Go gold
                    </button>
                </form>
            @endif
            
        @endif
        
    </h3>
</div>
<script src="/js/shout.js"></script>