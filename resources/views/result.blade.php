@extends ('layouts.layout') @section('content')
<section class="bg-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-1">
                <h1>Diagnosis Results</h1>
                <p class="text-muted">
                    Check diagnosis result, consult a professional. Give us a rating if diagnosis is valid.
                </p>
            </div>
            <div class="col-12 col-md-6 offset-md-1">
                <!-- loop through diagnoses -->
                @foreach($diagnoses as $diagnosis)
                <div class="bg-white border p-3 my-4 rounded">
                    <h2>{{$diagnosis['Issue']['Name']}}</h2>
                    <p class="text-muted pt-1 pb-3">{{$diagnosis['Issue']['IcdName']}}</p>
                    <p class="text-muted">Specialization: <span class="text-primary">{{$diagnosis['Specialisation'][0]['Name']}}</span>
                    <span class="ps-3">Chances: <b>{{$diagnosis['Issue']['Accuracy']}}% </b> </span>
                </p>
                </div>
                @endforeach                
            </div>
            <div class="col-12 col-md-3 offset-md-2 py-4">
                <h1>@if(!empty($msg))
                    {{$msg}}
                    @endif
                </h1>
                <form action="/" method="POST">
                    @csrf
                    <div class="py-4">
                        <h3 class="h5">Send a Feedback:</h3>
                        <input type="radio" class="btn-check" id="valid" name="feedback" autocomplete="off" value="valid" required>
                        <label class="btn btn-outline-primary" for="valid">Valid</label>
                        <input type="radio" class="btn-check" id="invalid" name="feedback" autocomplete="off" value="invalid">
                        <label class="btn btn-outline-primary" for="invalid">Invalid</label>
                    </div>

                    <button type="submit" class="btn btn-info">
                        Send Feedback
                    </button>
                </form>
            </div>
        </div>

    </div>
    </div>
</section>
@endsection