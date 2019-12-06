<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    .fadedfx {
        background-color: #fe5652;
        visibility: hidden;
    }

    .fadeIn {
        animation-name: fadeIn;
        -webkit-animation-name: fadeIn;
        animation-duration: 1.5s;
        -webkit-animation-duration: 1.5s;
        animation-timing-function: ease-in-out;
        -webkit-animation-timing-function: ease-in-out;
        visibility: visible !important;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0.0;
        }

        100% {
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeIn {
        0% {
            opacity: 0.0;
        }

        100% {
            opacity: 1;
        }
    }
</style>

<body class="grey lighten-2">



    {{-- START PAGE CONTAINER --}}
    <div class="container  ">

        <a href="{{ url('subscribe_group') }}" class="btn btn-danger"
            style="border-radius: 0;background-color: #DA0833; text-align:center;">Back</a>
        <br>
        @if(is_null($notification))
        <div class="card horizontal" style="margin-top:5%">
            <h4>No Any Notifications</h4>

        </div>
        @else
        @foreach($notification as $value)

        <div class="card horizontal" style="margin-top:5%">

            <div class="card-stacked">
                <div class="card-content">
                    <span class="card-title">
                        <h4 style="text-align: center; background-color: yellow">{{ $value->title  }}</h4>
                    </span>

                    <span style="float: right; padding-right:10px">{{ $value->date }}</span>
                    <ul style="list-style-type:square;">
                        <li>Group Name :- {{ $value->group_name  }}</li>
                        <li>Description :- </li>
                        <p>{{ $value->description  }}</p>

                    </ul>
                </div>

            </div>
        </div>
        @endforeach
        @endif
        {{-- START PAGE SIDEBAR --}}


        {{--  @include('layouts.sidebar')  --}}

        {{-- END PAGE SIDEBAR --}}
        {{-- PAGE CONTENT --}}

    </div>
    {{-- END PAGE CONTAINER --}}
    {{-- MESSAGE BOX--}}

    {{--  @include('layouts.message_box')  --}}
    {{-- END MESSAGE BOX--}}
    {{-- START SCRIPTS --}}

    {{--  @include('layouts.footer_scripts')  --}}

    {{-- END SCRIPTS --}}

</body>


</html>
