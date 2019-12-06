<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
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
    <div class="container">
        @if(is_null($package))
        <div class="card horizontal">
            <h4>No Any Packages</h4>
        </div>
        @else
        @foreach($package as $value)

        <div class="card horizontal">
            <div class="card-image">
                <img src="uploads/{{ $value->image  }}" style="width: 300px; height:300px;" class="fadeIn">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <span class="card-title">{{ $value->package_title  }}</span>
                    <ul style="list-style-type:square;">
                        <li>Number of Days :- {{ $value->package_validity  }} Days</li>
                        <li>You can register {{ $value->no_of_candidate  }} Candidates</li>
                        <li>Price :- Rs {{ $value->package_price  }}</li>
                        <li>Technical support</li>
                    </ul>
                </div>
                <div class="card-action">

                    @if(is_null($reference_id))
                    <a href="{{ url('consultancy_register') }}/{{ $value->id  }}" class="btn"
                        style="background-color:red">Buy</a>

                    @else
                    <a href="{{ url('consultancy_details') }}/{{ $value->id  }}/{{ $reference_id  }}" class="btn"
                        style="background-color:red">Buy</a>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
        @endif




    </div>





    </div>
</body>


</html>
