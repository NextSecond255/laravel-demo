<div>
    视图中的变量：
    <p>{{ $name }}</p>

    当前时间戳：
    <p>{{ time() }}</p>
</div>
<div>
    Hello,{!! $content !!}
</div>
<script>
    var app = @json($array);
    console.log(app);
</script>