@extends ('layouts.layout') @section('content')
<div class="container" style="min-height: 60vh;">
    <div class="row py-4">
        <div class="col-12 col-sm-4 offset-md-2 align-self-center">
            <div class="">
                <h1>
                    SeamHealth Diagnosis.
                </h1>
                <p class=" text-muted">
                    Select Symptoms, and enter basic informations so we can give you accurate diagnosis.
                </p>
                <form action="/diagnosis/result" method="POST" class="row g-3">
                    @csrf
                    <div class="col-12 col-md-12">
                        <label for="exampleDataList" class="form-label">Type in yout symptoms</label>
                        <input class="form-control" name="symptoms" list="datalistOptions " id="exampleDataList " placeholder="Symptoms... ">
                        <datalist id="datalistOptions ">
                            <!-- Looping through returned object-->
                            @if(!empty($symptoms))
                            @foreach($symptoms as $symptom)
                            <option value="{{$symptom[ 'ID']}}">
                                {{$symptom['Name']}}
                            </option>
                            @endforeach
                            @else
                            <option value="">
                                Loading items...
                            </option>
                            @endif
                        </datalist>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="row py-4 ">
                            <div class="col-6">
                                <label for="age " class="form-label ">Age</label>
                                <input type="number" class="form-control " id="age" name="age" maxlength="4" size="4" required>
                            </div>
                            <div class="col-6">
                                <h3 class="h5 ">Gender:</h3>
                                <input type="radio" class="btn-check" id="male" name="gender" autocomplete="off" value="male" required>
                                <label class="btn btn-outline-primary" for="male">Male</label>
                                <input type="radio" class="btn-check" id="female" name="gender" autocomplete="off" value="female">
                                <label class="btn btn-outline-primary" for="female">Female</label>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-11">
                            <button type="submit " class="btn btn-info shadow ">
                                GET DIAGNOSIS
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!--Mobile images-->
        <div class="col-12 col-sm-4">
            <div class="p-4">
                <img src="/images/firstapp.png" class="img-fluid" alt="" />
            </div>
        </div>
    </div>
</div>
@endsection