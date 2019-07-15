<div class="mt-5">
    <div>
        <h4>
            <a href="{{$website['url']}}" target="_blank">
                {{$website['title']}}
            </a>
        </h4>
    </div>
    <div>
        <span style="color:#006621">{{$website['url']}}</span>
    </div>
    <div>
        {{ \Illuminate\Support\Str::limit($website['description'], 160, '...')  }}
    </div>
</div>
