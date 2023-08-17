<ul class="theme-list">
    @foreach ($comments as $item)
        @if ($item->parent_id != null)
            <li class="fg-dark">
                <div class="card   " style='padding:2%;color:rgb(255, 0, 0);'>
                    <strong><img src="{{URL::asset($item->user->profile->photo)}}" alt=""  class="rounded-circle" width="30px" height="30px"> {{$item->user->name}} -> " {{$item->description}} "
                    @if (Auth::user()->id == $item->user->id || Auth::user()->level==1 )
                        <a style="float:right;color:rgb(255, 0, 0);" href="{{route('comments.destroy',['id'=>$item->id] )}}"><i class="fa fa-times"></i></a>
                    @endif</strong>
                    <small>{{$item->created_at->diffForhumans()}} </small>
                </div>
            </li>
        @endif
    @endforeach
</ul>
