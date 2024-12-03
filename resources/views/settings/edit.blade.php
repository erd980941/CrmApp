@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <!-- Kullanıcı Bilgileri Düzenleme Formu -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kullanıcı Düzenle</h5>

                        <form action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            @foreach($settings as $setting)
                                <div class="row mb-3">
                                    <label for="{{ $setting->key }}" class="col-sm-2 col-form-label" >{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" class="form-control">
                                    </div>
                                </div>
                            @endforeach
                           <div class="text-end" >
                                <button type="submit" class="btn btn-primary">Save</button>
                           </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
