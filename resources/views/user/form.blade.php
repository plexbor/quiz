<form action="{{ route('user.update') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="email">Email адрес:</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Введите email" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="form-group">
    <label for="bank_account">Банковский счёт:</label>
        <input type="text" name="bank_account" class="form-control" id="bank_account" placeholder="Введите номер счёта" value="{{ old('bank_account', $user->bank_account) }}">
    </div>
    <div class="form-group">
        <label for="address">Адрес доставки:</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Введите адрес" value="{{ old('address', $user->address) }}">
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
