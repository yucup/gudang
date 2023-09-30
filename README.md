Postman pada gudang
1. Pembuatan akun pada postman menggunakan array object
   ![image](https://github.com/yucup/gudang/assets/61656513/7efc2c1d-e09c-4671-a4f8-281738bc8443)

2. ketika akun melakukan login maka akan mendapatkan token dengan durasi waktu 1 jam
   ![image](https://github.com/yucup/gudang/assets/61656513/b3a24d3a-8661-426d-9052-c3794c91fc12)

3. ketika logout dan refresh maka token tidak akan bisa terpakai

4. ketika user ingin menginputkan data, user harus menggunakan token untuk memasukkan data tersebut
   ![image](https://github.com/yucup/gudang/assets/61656513/a9ebae17-43a1-4555-867c-e0044e0514eb)

5. middleware
   Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['prefix' => 'data'], function () {
    Route::get('/', [Keluar::class, 'index']);
    Route::get('/{id}', [Keluar::class, 'show']);
    Route::post('/', [Keluar::class, 'store']);
    Route::put('/', [Keluar::class, 'update']);
    Route::delete('/{id}', [Keluar::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [Masuk::class, 'index']);
    Route::get('/{id}', [Masuk::class, 'show']);
    Route::post('/', [Masuk::class, 'store']);
    Route::put('/{id}', [Masuk::class, 'update']);
    Route::delete('/{id}', [Masuk::class, 'destroy']);
});
  


