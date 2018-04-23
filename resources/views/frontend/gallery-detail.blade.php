@if(count($image)!=0)
    @foreach($image as $item)
        <li>
            <a class="ns-img" href="{{asset('images/gallery')}}/{{$item['image']}}"></a>
            <div class="caption">
                <h3>{{$galley['title']}}</h3>
            </div>
        </li>
    @endforeach
@endif


