<x-guest-layout>
    <div class="lg:grid lg:grid-cols-2">
        <div class="bg-blue-500/10 h-full relative">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20 w-[600px]">
                <img src="{{ asset('/assets/img/auth/register.png') }}" class="h-[600px] w-full" />
            </div>
        </div>
        <x-auth-card>
            <div class="font-extrabold text-center text-2xl mt-5">
                <h1>Daftar</h1>
            </div>
    
            <div class="text-sm text-center mt-2 mb-10">
                <p>Sudah punya akun? <a href="{{ route('login') }}"><span class="text-primary">Masuk</span></a></p>
            </div>
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf
    
                <div class="form-section">
                    <div>
                        <x-label for="name" :value="__('Nama')" />
                        <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}"
                            autofocus />
                    </div>
    
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
                        <input id="email" class="form-input" type="email" name="email"
                            value="{{ old('email') }}" />
                    </div>
    
                    <div class="mt-4 relative">
                        <x-label for="password" :value="__('Kata Sandi')" />
                        <input id="password" class="form-input pl-10" type="password" name="password"
                            autocomplete="new-password" />
                    </div>
    
                    <div class="mt-4 relative">
                        <x-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                        <input id="password_confirmation" class="form-input pl-10" type="password"
                            name="password_confirmation" />
                    </div>
                </div>
    
                <div class="form-section">
                    <div class="mt-4">
                        <x-label for="nik" :value="__('NIK')" />
                        <input id="nik" class="form-input" type="text" name="nik"
                            value="{{ old('nik') }}" />
                    </div>

                    <div class="mt-4">
                        <x-label for="instansi_id" :value="__('Instansi')" />
                        <select id="instansi" name="instansi_id"
                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option>--- Pilih instansi ---</option>
                            @foreach ($instansi as $item)
                                <option value="{{ $item->id_instansi }}">{{ $item->nama_instansi }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mt-4">
                        <x-label for="no_telp" :value="__('No Telepon')" />
                        <input id="no_telp" class="form-input" type="text" name="no_telp"
                            value="{{ old('no_telp') }}" />
                    </div>
    
                    <div class="mt-4">
                        <x-label for="alamat" :value="__('Alamat')" />
                        <input id="alamat" class="form-input" type="text" name="alamat"
                            value="{{ old('alamat') }}" />
                    </div>
    
                    <div class="mt-4">
                        <x-label for="nama_organisasi" :value="__('Nama Organisasi')" />
                        <input id="nama_organisasi" class="form-input" type="text" name="nama_organisasi"
                            value="{{ old('nama_organisasi') }}" />
                    </div>
                </div>
    
                <div class="form-navigation mt-8 flex items-center justify-between gap-2">
                    <button type="button"
                        class="previous py-2 w-full bg-slate-900/10 text-black rounded-lg">Kembali</button>
                    <button type="button" class="next w-full py-2 bg-slate-900/10 text-black/50 rounded-lg"
                        disabled>Selanjutnya</button>
                    <button type="submit" class="btn-submit w-full py-2 bg-slate-900/10 text-black/50 rounded-lg"
                        disabled>Register</button>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>

<script src="{{ asset('js/auth/register-script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
    integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function() {
        var $sections = $('.form-section')

        function navigateTo(index) {
            $sections.removeClass('current').eq(index).addClass('current')
            $('.form-navigation .previous').toggle(index > 0)
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd)
            $('.form-navigation [type=submit]').toggle(atTheEnd)
        }

        function curIndex() {
            return $sections.index($sections.filter('.current'))
        }

        $('.form-navigation .previous').click(function() {
            navigateTo(curIndex() - 1)
        })

        $('.form-navigation .next').click(function() {
            $('.register-form').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function() {
                navigateTo(curIndex() + 1)
            })
        })

        $sections.each(function(index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block' + index)
        })

        navigateTo(0)
    })
</script>
