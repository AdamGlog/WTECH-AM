<!-- Modálne okno - Prihlásenie -->
    <div class="modal fade" id="profil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Prihlásenie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/login">
                    @csrf
                    <div class="modal-body">
                        <label>Nickname profilu</label>
                        <input type="text" name="nickname" class="form-control" value="{{ old('nickname') }}">
                        <label>Heslo</label>
                        <input type="password" name="heslo" class="form-control">
                        <!-- chyba pri nesprávnom login -->
                        @error('nickname')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer d-flex flex-column align-items-center">
                        <button type="submit" class="btn btn-primary">Prihlásiť</button>
                        <label for="exampleName" class="form-label">
                            Nemáte účet? Zaregistrujte sa -> <a href="/registration">TU</a>
                        </label>
                    </div>
                </form> 
            </div>
        </div>
    </div>