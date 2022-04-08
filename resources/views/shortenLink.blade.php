<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ trans('text.header') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/scripts/url-handler.js') }}"></script>
</head>

<body>
<div class="container">
    <h1>{{ trans('text.header') }}</h1>
    <div class="card">
      <div class="card-header">
        <form id="url-form">
          <!-- csrf token-->
          <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="{{ trans('text.url_placeholder') }}" aria-label="Recipient's username" aria-describedby="basic-addon2" required="">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">{{ trans('text.button') }}</button>
              </div>
            </div>
        </form>
      </div>

      <!-- Vaidation errors -->
      @if ($errors->count())
          {{-- Error list --}}
          <div class="alert alert-danger">
          @foreach($errors->all() as $error)
          <ul>
              <li>{{ $error }}</li>
          </ul>
          @endforeach
        </div>
      @endif

      <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ trans('text.success_generation') }}</p>
                </div>
            @endif

            <hr>
            <h3>{{ trans('text.short_url') }}</h3>
            @if($short_link === "Empty")
                <p><a target="_blank"></a>{{ trans('text.empty_url') }}</p>
            @else
                <p><a href="{{ route('normal.link', $short_link) }}" target="_blank">{{ route('normal.link', $short_link) }}</a></p>
            @endif
      </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-primary").click(function(e){
        e.preventDefault();
        var url = $("input[name=link]").val();
        if (!url.trim() || !isUrl(url)) {
            alert("The link isn't valid!");
        } else {
            $.ajax({
                type:'POST',
                url:"{{ route('generate.link.post') }}",
                data:{ link:url },
                error:function(data) {
                  alert("The link isn't valid!");
                },
                success:function(data) {
                    location.reload();
                }
            });
        }
    });
</script>

</html>
