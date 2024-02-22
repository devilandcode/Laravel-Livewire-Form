<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mb-5">
            <div class="signup-form d-flex align-content-center">
                <form wire:submit.prevent="save" class="mt-5 border p-4 bg-light shadow">
                    @if(!$submited)
                    <h4 class="mb-5 text-secondary">Заполните форму</h4>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>Имя<span class="text-danger">*</span></label>
                            <input type="text" name="fname" wire:model="name" class="form-control @error('name') is-invalid @enderror" placeholder="Ваше имя" id="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Фамилия<span class="text-danger">*</span></label>
                            <input type="text" name="lname" wire:model="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Ваша фамилия" id="lastname">
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Отчество</label>
                            <input type="text" name="mname" wire:model="mid_name" class="form-control @error('midName') is-invalid @enderror" placeholder="Ваше отчество">
                            @error('midName')
                                <div class="invalid-feedback">{{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Дата рождения<span class="text-danger">*</span></label>
                            <input type="date" name="date" wire:model="dob" class="form-control @error('dob') is-invalid @enderror" placeholder="dd/mm/yyyy" id="dob">
                            @error('dob')
                                <div class="invalid-feedback">{{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Email</label>
                            <input type="email" name="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ваш email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3 pe-0">
                            <label>Код страны</label>
                            <select wire:model="phoneCode.0" class="form-select @error('phoneCode') is-invalid @enderror" aria-label="Default select example">
                                <option selected>+</option>
                                <option value="7">+7</option>
                                <option value="375">+375</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-7 ps-0">
                            <label>Телефон</label>
                            <input type="number" name="phone.0" wire:model="phone.0" class="form-control @error('phone') is-invalid @enderror" placeholder="Ваш телефон">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-2 px-0">
                            <label>Добавить</label>
                            <button wire:click="add({{ $i }})" type="button" class="btn btn-success">+</button>
                        </div>
                        @foreach($inputs as $key => $value)
                            <div class="mb-3 col-md-3 pe-0">
                                <label>Код страны</label>
                                <select  wire:model="phoneCode.{{$value}}" class="form-select @error('phoneCode') is-invalid @enderror" aria-label="Default select example">
                                    <option selected>+</option>
                                    <option value="7">+7</option>
                                    <option value="375">+375</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-7 ps-0">
                                <label>Телефон</label>
                                <input wire:model="phone.{{$value}}" type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Ваш телефон">
                            </div>
                            <div class="mb-3 col-md-2 px-0">
                                <label>Удалить</label>
                                <button wire:click="remove({{$key}})" type="button" class="btn btn-danger text-white">-</button>
                            </div>
                        @endforeach
                        <div class="mb-3 col-md-12">
                            <label>Семейное положение<span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" wire:model="status" aria-label="Default select example">
                                <option selected>Выберете из списка</option>
                                <option value="Холост/не замужем">Холост/не замужем</option>
                                <option value="Женат/замужем">Женат/замужем</option>
                                <option value="В разводе">В разводе</option>
                                <option value="Вдовец/вдова">Вдовец/вдова</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Прикрепить файл</label>
                            <input type="file" wire:model="docs" multiple>

                            <div wire:loading wire:target="docs">Uploading...</div>
                            @error('docs.*')
                                <div class="invalid-feedback"> {{ $message  }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <textarea class="form-control @error('about') is-invalid @enderror" placeholder="О себе" wire:model="about" name="yourself" id="textarea" ></textarea>
                        </div>
                            @error('about')
                            <div class="invalid-feedback"> {{ $message  }}</div>
                            @enderror
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary float-end">Отправить</button>
                        </div>
                    </div>
                    @else
                        <div class=""></div>
                        <div class="alert alert-success" role="alert">
                            Ваша Заявка Успешно Отправлена!
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>


