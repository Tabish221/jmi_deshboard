@extends('ru.cpanel.layout')
@section('content')


    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
       <div class="panel panel-default">
            <div class="panel-heading">
                    <h4 class="panel-title">{{ $title}}</h4>
            </div>

            <div class="panel-body">

        <!--start content -->
    {!! Form::open(['url'=>'ru/cpanel/profile'])  !!}
        <h4 class="col-sm-push-1">Личные данные</h4>
        <hr />
        <div class="col-sm-12">
            <div class="col-sm-8 col-sm-push-1">

@if (session('status-success'))
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-success') }}
    </div>
@endif

@if (session('status-error'))
    <div class="alert alert-danger">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('status-error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <label class="col-sm-4">заглавие</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="title" id="title">
                                <option value="0">г-н</option>
                                <option value="1">Миссис</option>
                                <option value="2">мисс</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">ФИО</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{!! $user->fullname !!}">
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Эл. адрес</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input readonly type="email" name="email" value="{!! $user->email !!}"  class="form-control" id="form-email"  required>

                            <span id="changeemail" class="btn btn-warning fa fa-edit" onclick="changeemail();" >сменить почту</span>
                            <span id="checkemail" class="btn btn-default  fa fa-sync" onclick="checkemail();" style="display:none;"> Проверь электронную почту </span>
                            <label for="email"></label>
                            @if($user->email_status==0) <span class="text-danger" id="sendverificationmail" >непроверенный </span>(<a class="cursor-pointer" id="sendverificationmail" onclick="sendverificationmail();" id="sendverificationmail" style="cursor: pointer;">Отправить письмо с подтверждением</a>) @endif
                            @if($user->email_status==1) <span class="fa fa-check text-success">Проверенный</span> @endif

                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">имя пользователя</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input readonly  type="text" name="username" value="{!! $user->username !!}" class="form-control" id="form-username"  required>
                            <span id="changeusername" class="btn btn-warning fa fa-edit" onclick="changeusername();" >Изменение имени пользователя</span>

                            <span id="checkusername" class="btn btn-default fa fa-sync" onclick="checkusername();" style="display:none;"> Проверьте имя пользователя </span>
                            <label for="username"></label>


                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">пароль</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <a class="btn btn-success" href="/ru/cpanel/password" >Изменить пароль</a>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Пол</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" disabled selected >--Выбрать--</option>
                                <option value="1">мужчина</option>
                                <option value="0">женский</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Дата рождения</label>
                    <div class="col-sm-8">
                        <div class="col-sm-4 padding-left-0" >
                            <select class="form-control" id="days" name="birthday" required>
                              <option class="form-control" value="" disabled selected>День</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" id="months"  name="birthmonth" required>
                              <option class="form-control" value="" disabled selected>Месяц</option>
                            </select>
                        </div>
                        <div class="col-sm-4 padding-right-0" >
                            <select class="form-control" id="years"  name="birthyear" required>
                              <option class="form-control" value="" disabled selected>Год</option>
                            </select>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <h4>Домашний адрес</h4>
        <hr />
        <div class="col-sm-12">
            <div class="col-sm-8 col-sm-push-1">

                <div class="row">
                    <label class="col-sm-4">Адрес 1</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" name="address1" value="{!! $user->address1 !!}"  class="form-control"  required>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Адрес 2</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" name="address2" value="{!! $user->address2 !!}"  class="form-control"  >
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Город / Город </label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" name="town_city" value="{!! $user->town_city !!}"  class="form-control"  required>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Почтовый индекс</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <input type="text" name="post_code" value="{!! $user->post_code !!}"  class="form-control"  required>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Страна</label>
                    <div class="col-sm-8">
                        <div class="controls">

                            <select name="country" id="country"  class="form-control" onchange="countryfun();"  required>
                                        <option  value="" disabled selected>Выберите страну</option>
                                        <option data-countryCode="DZ" value="Algeria">Алжир </option>
                                        <option data-countryCode="AD" value="Andorra">андорра </option>
                                        <option data-countryCode="AO" value="Angola">Ангола </option>
                                        <option data-countryCode="AI" value="Anguilla">Ангилья </option>
                                        <option data-countryCode="AG" value="Antigua">Антигуа и Барбуда </option>
                                        <option data-countryCode="AR" value="Argentina">Аргентина </option>
                                        <option data-countryCode="AM" value="Armenia">Армения </option>
                                        <option data-countryCode="AW" value="Aruba">Аруба </option>
                                        <option data-countryCode="AU" value="Australia">Австралия </option>
                                        <option data-countryCode="AT" value="Austria">Австрия </option>
                                        <option data-countryCode="AZ" value="Azerbaijan">Азербайджан </option>
                                        <option data-countryCode="BS" value="Bahamas">Багамские о-ва </option>
                                        <option data-countryCode="BH" value="Bahrain">Бахрейн </option>
                                        <option data-countryCode="BD" value="Bangladesh">Бангладеш </option>
                                        <option data-countryCode="BB" value="Barbados">Барбадос </option>
                                        <option data-countryCode="BY" value="Belarus">Беларусь </option>
                                        <option data-countryCode="BE" value="Belgium">Бельгия </option>
                                        <option data-countryCode="BZ" value="Belize">Белиз </option>
                                        <option data-countryCode="BJ" value="Benin">Бенин </option>
                                        <option data-countryCode="BM" value="Bermuda">Бермудские острова </option>
                                        <option data-countryCode="BT" value="Bhutan">Бутан </option>
                                        <option data-countryCode="BO" value="Bolivia">Боливия </option>
                                        <option data-countryCode="BA" value="Bosnia Herzegovina">Босния и Герцеговина</option>
                                        <option data-countryCode="BW" value="Botswana">Ботсвана </option>
                                        <option data-countryCode="BR" value="Brazil">Бразилия </option>
                                        <option data-countryCode="BN" value="Brunei">Бруней </option>
                                        <option data-countryCode="BG" value="Bulgaria">Болгария </option>
                                        <option data-countryCode="BF" value="Burkina Faso">Буркина-Фасо </option>
                                        <option data-countryCode="BI" value="Burundi">Бурунди </option>
                                        <option data-countryCode="KH" value="Cambodia">Камбоджа </option>
                                        <option data-countryCode="CM" value="Cameroon">Камерун </option>
                                        <option data-countryCode="CA" value="Canada">Канада </option>
                                        <option data-countryCode="CV" value="Cape Verde Islands">Острова Кабо-Верде</option>
                                        <option data-countryCode="KY" value="Cayman Islands">Каймановы острова </option>
                                        <option data-countryCode="CF" value="Central African Republic">Центрально-Африканская Республика </option>
                                        <option data-countryCode="CL" value="Chile">Чили </option>
                                        <option data-countryCode="CN" value="China">Китай </option>
                                        <option data-countryCode="CO" value="Colombia">Колумбия </option>
                                        <option data-countryCode="KM" value="Comoros">Коморские острова </option>
                                        <option data-countryCode="CG" value="Congo">Конго </option>
                                        <option data-countryCode="CK" value="Cook Islands">Острова Кука </option>
                                        <option data-countryCode="CR" value="Costa Rica">Коста Рика </option>
                                        <option data-countryCode="HR" value="Croatia">Хорватия </option>
                                        <option data-countryCode="CU" value="Cuba">Куба </option>
                                        <option data-countryCode="CY" value="Cyprus North">Северный Кипр </option>
                                        <option data-countryCode="CY" value="Cyprus South">Кипр Юг </option>
                                        <option data-countryCode="CZ" value="Czech Republic">Чехия </option>
                                        <option data-countryCode="DK" value="Denmark">Дания </option>
                                        <option data-countryCode="DJ" value="Djibouti">Джибути </option>
                                        <option data-countryCode="DM" value="Dominica">Dominica </option>
                                        <option data-countryCode="DO" value="Dominican Republic">Доминиканская Респблика</option>
                                        <option data-countryCode="EC" value="Ecuador">Эквадор </option>
                                        <option data-countryCode="EG" value="Egypt">Египет </option>
                                        <option data-countryCode="SV" value="El Salvador">Сальвадор </option>
                                        <option data-countryCode="GQ" value="Equatorial Guinea">Экваториальная Гвинея </option>
                                        <option data-countryCode="ER" value="Eritrea">Эритрея </option>
                                        <option data-countryCode="EE" value="Estonia">Эстония </option>
                                        <option data-countryCode="ET" value="Ethiopia">Эфиопия </option>
                                        <option data-countryCode="FK" value="Falkland Islands">Фолклендские острова </option>
                                        <option data-countryCode="FO" value="Faroe Islands">Фарерские острова </option>
                                        <option data-countryCode="FJ" value="Fiji">Фиджи </option>
                                        <option data-countryCode="FI" value="Finland">Финляндия </option>
                                        <option data-countryCode="FR" value="France">Франция </option>
                                        <option data-countryCode="GF" value="French Guiana">Французская Гвиана </option>
                                        <option data-countryCode="PF" value="French Polynesia">Французская Полинезия </option>
                                        <option data-countryCode="GA" value="Gabon">Габон </option>
                                        <option data-countryCode="GM" value="Gambia">Гамбия </option>
                                        <option data-countryCode="GE" value="Georgia">Грузия </option>
                                        <option data-countryCode="DE" value="Germany">Германия </option>
                                        <option data-countryCode="GH" value="Ghana">Гана </option>
                                        <option data-countryCode="GI" value="Gibraltar">Гибралтар </option>
                                        <option data-countryCode="GR" value="Greece">Греция </option>
                                        <option data-countryCode="GL" value="Greenland">Гренландия </option>
                                        <option data-countryCode="GD" value="Grenada">Гренада </option>
                                        <option data-countryCode="GP" value="Guadeloupe">Гваделупа </option>
                                        <option data-countryCode="GU" value="Guam">Гуам </option>
                                        <option data-countryCode="GT" value="Guatemala">Гватемала </option>
                                        <option data-countryCode="GN" value="Guinea">Гвинея </option>
                                        <option data-countryCode="GW" value="Guinea - Bissau">Гвинея - Бисау </option>
                                        <option data-countryCode="GY" value="Guyana">Гайана </option>
                                        <option data-countryCode="HT" value="Haiti">Гаити </option>
                                        <option data-countryCode="HN" value="Honduras">Гондурас </option>
                                        <option data-countryCode="HK" value="Hong Kong">Гонконг</option>
                                        <option data-countryCode="HU" value="Hungary">Венгрия </option>
                                        <option data-countryCode="IS" value="Iceland">Исландия </option>
                                        <option data-countryCode="IN" value="India">Индия </option>
                                        <option data-countryCode="ID" value="Indonesia">Индонезия </option>
                                        <option data-countryCode="IR" value="Iran">Иран </option>
                                        <option data-countryCode="IQ" value="Iraq">Ирак </option>
                                        <option data-countryCode="IE" value="Ireland">Ирландия </option>
                                        <option data-countryCode="IL" value="Palestine">Израиль </option>
                                        <option data-countryCode="IT" value="Italy">Италия </option>
                                        <option data-countryCode="JM" value="Jamaica">Ямайка </option>
                                        <option data-countryCode="JP" value="Japan">Япония </option>
                                        <option data-countryCode="JO" value="Jordan">Иордания </option>
                                        <option data-countryCode="KZ" value="Kazakhstan">Казахстан </option>
                                        <option data-countryCode="KE" value="Kenya">Кения </option>
                                        <option data-countryCode="KI" value="Kiribati">Кирибати </option>
                                        <option data-countryCode="KP" value="Korea North">Северная Корея </option>
                                        <option data-countryCode="KR" value="Korea South">Корея, Юг</option>
                                        <option data-countryCode="KW" value="Kuwait">Кувейт </option>
                                        <option data-countryCode="KG" value="Kyrgyzstan">Киргизия </option>
                                        <option data-countryCode="LA" value="Laos">Лаос </option>
                                        <option data-countryCode="LV" value="Latvia">Латвия </option>
                                        <option data-countryCode="LB" value="Lebanon">Ливан </option>
                                        <option data-countryCode="LS" value="Lesotho">Лесото </option>
                                        <option data-countryCode="LR" value="Liberia">Либерия </option>
                                        <option data-countryCode="LY" value="Libya">Ливия </option>
                                        <option data-countryCode="LI" value="Liechtenstein">Лихтенштейн </option>
                                        <option data-countryCode="LT" value="Lithuania">Литва </option>
                                        <option data-countryCode="LU" value="Luxembourg">Люксембург </option>
                                        <option data-countryCode="MO" value="Macao">Macao </option>
                                        <option data-countryCode="MK" value="Macedonia">Македония </option>
                                        <option data-countryCode="MG" value="Madagascar">Мадагаскар </option>
                                        <option data-countryCode="MW" value="Malawi">Малави </option>
                                        <option data-countryCode="MY" value="Malaysia">Малайзия </option>
                                        <option data-countryCode="MV" value="Maldives">Мальдивы </option>
                                        <option data-countryCode="ML" value="Mali">Мали </option>
                                        <option data-countryCode="MT" value="Malta">Мальта </option>
                                        <option data-countryCode="MH" value="Marshall Islands">Маршалловы острова </option>
                                        <option data-countryCode="MQ" value="Martinique">Мартиника </option>
                                        <option data-countryCode="MR" value="Mauritania">Мавритания </option>
                                        <option data-countryCode="YT" value="Mayotte">Майотта </option>
                                        <option data-countryCode="MX" value="Mexico">Мексика </option>
                                        <option data-countryCode="FM" value="Micronesia">Микронезия </option>
                                        <option data-countryCode="MD" value="Moldova">Молдова </option>
                                        <option data-countryCode="MC" value="Monaco">Монако </option>
                                        <option data-countryCode="MN" value="Mongolia">Монголия </option>
                                        <option data-countryCode="MS" value="Montserrat">Монсеррат </option>
                                        <option data-countryCode="MA" value="Morocco">Марокко </option>
                                        <option data-countryCode="MZ" value="Mozambique">Мозамбик </option>
                                        <option data-countryCode="MN" value="Myanmar">Мьянма </option>
                                        <option data-countryCode="NA" value="Namibia">Намибия </option>
                                        <option data-countryCode="NR" value="Nauru">Науру </option>
                                        <option data-countryCode="NP" value="Nepal">Непал </option>
                                        <option data-countryCode="NL" value="Netherlands">Нидерланды </option>
                                        <option data-countryCode="NC" value="New Caledonia">Новая Каледония </option>
                                        <option data-countryCode="NZ" value="New Zealand">Новая Зеландия </option>
                                        <option data-countryCode="NI" value="Nicaragua">Никарагуа </option>
                                        <option data-countryCode="NE" value="Niger">Нигер </option>
                                        <option data-countryCode="NG" value="Nigeria">Нигерия </option>
                                        <option data-countryCode="NU" value="Niue">Niue </option>
                                        <option data-countryCode="NF" value="Norfolk Islands">Норфолкские острова </option>
                                        <option data-countryCode="NP" value="Northern Marianas">Северные Марианские острова </option>
                                        <option data-countryCode="NO" value="Norway">Норвегия </option>
                                        <option data-countryCode="OM" value="Oman">Оман </option>
                                        <option data-countryCode="PAK" value="Pakistan">Пакистан </option>
                                        <option data-countryCode="PW" value="Palau">Палау </option>
                                        <option data-countryCode="PA" value="Panama">Панама </option>
                                        <option data-countryCode="PG" value="Papua New Guinea">Папуа новая Гвинея</option>
                                        <option data-countryCode="PY" value="Paraguay">Парагвай </option>
                                        <option data-countryCode="PE" value="Peru">Перу </option>
                                        <option data-countryCode="PH" value="Philippines">Филиппины </option>
                                        <option data-countryCode="PL" value="Poland">Польша </option>
                                        <option data-countryCode="PT" value="Portugal">Португалия </option>
                                        <option data-countryCode="PR" value="Puerto Rico">Пуэрто-Рико </option>
                                        <option data-countryCode="QA" value="Qatar">Катар </option>
                                        <option data-countryCode="RE" value="Reunion">воссоединение </option>
                                        <option data-countryCode="RO" value="Romania">Румыния </option>
                                        <option data-countryCode="RU" value="Russia">Россия </option>
                                        <option data-countryCode="RW" value="Rwanda">Руанда </option>
                                        <option data-countryCode="SM" value="San Marino">Сан-Марино </option>
                                        <option data-countryCode="ST" value="Sao Tome &amp; Principe">Сан-Томе и Принсипи</option>
                                        <option data-countryCode="SA" value="Saudi Arabia">Саудовская Аравия </option>
                                        <option data-countryCode="SN" value="Senegal">Сенегал </option>
                                        <option data-countryCode="CS" value="Serbia">Сербия </option>
                                        <option data-countryCode="SC" value="Seychelles">Сейшельские острова </option>
                                        <option data-countryCode="SL" value="Sierra Leone">Сьерра-Леоне </option>
                                        <option data-countryCode="SG" value="Singapore">Сингапур </option>
                                        <option data-countryCode="SK" value="Slovak Republic">Словацкая Республика </option>
                                        <option data-countryCode="SI" value="Slovenia">Словения </option>
                                        <option data-countryCode="SB" value="Solomon Islands">Соломоновы острова </option>
                                        <option data-countryCode="SO" value="Somalia">Сомали </option>
                                        <option data-countryCode="ZA" value="South Africa">Южная Африка </option>
                                        <option data-countryCode="ES" value="Spain">Испания </option>
                                        <option data-countryCode="LK" value="Sri Lanka">Шри-Ланка </option>
                                        <option data-countryCode="SH" value="St. Helena">Остров Святой Елены </option>
                                        <option data-countryCode="KN" value="St. Kitts">Сент-Китс </option>
                                        <option data-countryCode="SC" value="St. Lucia">Сент-Люсия </option>
                                        <option data-countryCode="SD" value="Sudan">Судан </option>
                                        <option data-countryCode="SR" value="Suriname">Суринам </option>
                                        <option data-countryCode="SZ" value="Swaziland">Свазиленд </option>
                                        <option data-countryCode="SE" value="Sweden">Швеция </option>
                                        <option data-countryCode="CH" value="Switzerland">Швейцария </option>
                                        <option data-countryCode="SI" value="Syria">Сирия </option>
                                        <option data-countryCode="TW" value="Taiwan">Тайвань </option>
                                        <option data-countryCode="TJ" value="Tajikstan">Таджикистан </option>
                                        <option data-countryCode="TH" value="Thailand">Таиланд </option>
                                        <option data-countryCode="TG" value="Togo">Идти </option>
                                        <option data-countryCode="TO" value="Tonga">Тонга </option>
                                        <option data-countryCode="TT" value="Trinidad &amp; Tobago">Тринидад и Тобаго </option>
                                        <option data-countryCode="TN" value="Tunisia">Тунис </option>
                                        <option data-countryCode="TR" value="Turkey">индейка </option>
                                        <option data-countryCode="TM" value="Turkmenistan">Туркменистан </option>
                                        <option data-countryCode="TC" value="Turks &amp; Caicos Islands">Острова Теркс и Кайкос</option>
                                        <option data-countryCode="TV" value="Tuvalu">Тувалу </option>
                                        <option data-countryCode="UG" value="Uganda">Уганда </option>
                                         <option data-countryCode="GB" value="UK">Великобритания </option>
                                        <option data-countryCode="UA" value="Ukraine">Украина </option>
                                        <option data-countryCode="AE" value="United Arab Emirates">Объединенные Арабские Эмираты </option>
                                        <option data-countryCode="UY" value="Uruguay">Уругвай </option>
                                         <option data-countryCode="US" value="USA">США </option>
                                        <option data-countryCode="UZ" value="Uzbekistan">Узбекистан </option>
                                        <option data-countryCode="VU" value="Vanuatu">Вануату </option>
                                        <option data-countryCode="VA" value="Vatican City">Ватикан </option>
                                        <option data-countryCode="VE" value="Venezuela">Венесуэла </option>
                                        <option data-countryCode="VN" value="Vietnam">Вьетнам </option>
                                        <option data-countryCode="VG" value="Virgin Islands - British">Виргинские острова - Британские </option>
                                        <option data-countryCode="VI" value="Virgin Islands - US ">Виргинские острова - США</option>
                                        <option data-countryCode="WF" value="Wallis &amp; Futuna">Уоллис и Футуна </option>
                                        <option data-countryCode="YE" value="Yemen North">Север Йемена</option>
                                        <option data-countryCode="YE" value="Yemen South">Йеменский Юг</option>
                                        <option data-countryCode="ZM" value="Zambia">Замбия </option>
                                        <option data-countryCode="ZW" value="Zimbabwe">Зимбабве </option>
                                    </select>


                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Дом</label>
                    <div class="col-sm-8">
                        <div class="col-sm-4 padding-left-0" >
                            <select name="countryCode" id="countryCode"  class="form-control"   required>
                                <option  value="" disabled selected>Код</option>
                                <option data-countryCode="DZ" value="213">+213</option>
                                <option data-countryCode="AD" value="376"> +376</option>
                                <option data-countryCode="AO" value="244"> +244</option>
                                <option data-countryCode="AI" value="1264"> +1264</option>
                                <option data-countryCode="AG" value="1268">+1268</option>
                                <option data-countryCode="PAK" value="92">+92</option>
                                <option data-countryCode="AR" value="54"> +54</option>
                                <option data-countryCode="AM" value="374"> +374</option>
                                <option data-countryCode="AW" value="297"> +297</option>
                                <option data-countryCode="AU" value="61"> +61</option>
                                <option data-countryCode="AT" value="43"> +43</option>
                                <option data-countryCode="AZ" value="994"> +994</option>
                                <option data-countryCode="BS" value="1242"> +1242</option>
                                <option data-countryCode="BH" value="973"> +973</option>
                                <option data-countryCode="BD" value="880"> +880</option>
                                <option data-countryCode="BB" value="1246"> +1246</option>
                                <option data-countryCode="BY" value="375"> +375</option>
                                <option data-countryCode="BE" value="32"> +32</option>
                                <option data-countryCode="BZ" value="501"> +501</option>
                                <option data-countryCode="BJ" value="229"> +229</option>
                                <option data-countryCode="BM" value="1441"> +1441</option>
                                <option data-countryCode="BT" value="975"> +975</option>
                                <option data-countryCode="BO" value="591"> +591</option>
                                <option data-countryCode="BA" value="387">  +387</option>
                                <option data-countryCode="BW" value="267"> +267</option>
                                <option data-countryCode="BR" value="55"> +55</option>
                                <option data-countryCode="BN" value="673"> +673</option>
                                <option data-countryCode="BG" value="359"> +359</option>
                                <option data-countryCode="BF" value="226"> Faso +226</option>
                                <option data-countryCode="BI" value="257"> +257</option>
                                <option data-countryCode="KH" value="855"> +855</option>
                                <option data-countryCode="CM" value="237"> +237</option>
                                <option data-countryCode="CA" value="1"> +1</option>
                                <option data-countryCode="CV" value="238"> +238</option>
                                <option data-countryCode="KY" value="1345">  +1345</option>
                                <option data-countryCode="CF" value="236">   +236</option>
                                <option data-countryCode="CL" value="56"> +56</option>
                                <option data-countryCode="CN" value="86"> +86</option>
                                <option data-countryCode="CO" value="57"> +57</option>
                                <option data-countryCode="KM" value="269"> +269</option>
                                <option data-countryCode="CG" value="242"> +242</option>
                                <option data-countryCode="CK" value="682">  +682</option>
                                <option data-countryCode="CR" value="506">  +506</option>
                                <option data-countryCode="HR" value="385"> +385</option>
                                <option data-countryCode="CU" value="53"> +53</option>
                                <option data-countryCode="CY" value="90392">  +90392</option>
                                <option data-countryCode="CY" value="357">  +357</option>
                                <option data-countryCode="CZ" value="42">  +42</option>
                                <option data-countryCode="DK" value="45"> +45</option>
                                <option data-countryCode="DJ" value="253"> +253</option>
                                <option data-countryCode="DM" value="1809"> +1809</option>
                                <option data-countryCode="DO" value="1809">  +1809</option>
                                <option data-countryCode="EC" value="593"> +593</option>
                                <option data-countryCode="EG" value="20"> +20</option>
                                <option data-countryCode="SV" value="503">  +503</option>
                                <option data-countryCode="GQ" value="240">  +240</option>
                                <option data-countryCode="ER" value="291"> +291</option>
                                <option data-countryCode="EE" value="372"> +372</option>
                                <option data-countryCode="ET" value="251"> +251</option>
                                <option data-countryCode="FK" value="500">  +500</option>
                                <option data-countryCode="FO" value="298">  +298</option>
                                <option data-countryCode="FJ" value="679"> +679</option>
                                <option data-countryCode="FI" value="358"> +358</option>
                                <option data-countryCode="FR" value="33"> +33</option>
                                <option data-countryCode="GF" value="594">  +594</option>
                                <option data-countryCode="PF" value="689">  +689</option>
                                <option data-countryCode="GA" value="241"> +241</option>
                                <option data-countryCode="GM" value="220"> +220</option>
                                <option data-countryCode="GE" value="7880"> +7880</option>
                                <option data-countryCode="DE" value="49"> +49</option>
                                <option data-countryCode="GH" value="233"> +233</option>
                                <option data-countryCode="GI" value="350"> +350</option>
                                <option data-countryCode="GR" value="30"> +30</option>
                                <option data-countryCode="GL" value="299"> +299</option>
                                <option data-countryCode="GD" value="1473"> +1473</option>
                                <option data-countryCode="GP" value="590"> +590</option>
                                <option data-countryCode="GU" value="671"> +671</option>
                                <option data-countryCode="GT" value="502"> +502</option>
                                <option data-countryCode="GN" value="224"> +224</option>
                                <option data-countryCode="GW" value="245">  +245</option>
                                <option data-countryCode="GY" value="592"> +592</option>
                                <option data-countryCode="HT" value="509"> +509</option>
                                <option data-countryCode="HN" value="504"> +504</option>
                                <option data-countryCode="HK" value="852">  +852</option>
                                <option data-countryCode="HU" value="36"> +36</option>
                                <option data-countryCode="IS" value="354"> +354</option>
                                <option data-countryCode="IN" value="91"> +91</option>
                                <option data-countryCode="ID" value="62"> +62</option>
                                <option data-countryCode="IR" value="98"> +98</option>
                                <option data-countryCode="IQ" value="964"> +964</option>
                                <option data-countryCode="IE" value="353"> +353</option>
                                <option data-countryCode="IL" value="972"> +972</option>
                                <option data-countryCode="IT" value="39"> +39</option>
                                <option data-countryCode="JM" value="1876"> +1876</option>
                                <option data-countryCode="JP" value="81"> +81</option>
                                <option data-countryCode="JO" value="962"> +962</option>
                                <option data-countryCode="KZ" value="7"> +7</option>
                                <option data-countryCode="KE" value="254"> +254</option>
                                <option data-countryCode="KI" value="686"> +686</option>
                                <option data-countryCode="KP" value="850">  +850</option>
                                <option data-countryCode="KR" value="82">  +82</option>
                                <option data-countryCode="KW" value="965"> +965</option>
                                <option data-countryCode="KG" value="996"> +996</option>
                                <option data-countryCode="LA" value="856"> +856</option>
                                <option data-countryCode="LV" value="371"> +371</option>
                                <option data-countryCode="LB" value="961"> +961</option>
                                <option data-countryCode="LS" value="266"> +266</option>
                                <option data-countryCode="LR" value="231"> +231</option>
                                <option data-countryCode="LY" value="218"> +218</option>
                                <option data-countryCode="LI" value="417"> +417</option>
                                <option data-countryCode="LT" value="370"> +370</option>
                                <option data-countryCode="LU" value="352"> +352</option>
                                <option data-countryCode="MO" value="853"> +853</option>
                                <option data-countryCode="MK" value="389"> +389</option>
                                <option data-countryCode="MG" value="261"> +261</option>
                                <option data-countryCode="MW" value="265"> +265</option>
                                <option data-countryCode="MY" value="60"> +60</option>
                                <option data-countryCode="MV" value="960"> +960</option>
                                <option data-countryCode="ML" value="223"> +223</option>
                                <option data-countryCode="MT" value="356"> +356</option>
                                <option data-countryCode="MH" value="692">  +692</option>
                                <option data-countryCode="MQ" value="596"> +596</option>
                                <option data-countryCode="MR" value="222"> +222</option>
                                <option data-countryCode="YT" value="269"> +269</option>
                                <option data-countryCode="MX" value="52"> +52</option>
                                <option data-countryCode="FM" value="691"> +691</option>
                                <option data-countryCode="MD" value="373"> +373</option>
                                <option data-countryCode="MC" value="377"> +377</option>
                                <option data-countryCode="MN" value="976"> +976</option>
                                <option data-countryCode="MS" value="1664"> +1664</option>
                                <option data-countryCode="MA" value="212"> +212</option>
                                <option data-countryCode="MZ" value="258"> +258</option>
                                <option data-countryCode="MN" value="95"> +95</option>
                                <option data-countryCode="NA" value="264"> +264</option>
                                <option data-countryCode="NR" value="674"> +674</option>
                                <option data-countryCode="NP" value="977"> +977</option>
                                <option data-countryCode="NL" value="31"> +31</option>
                                <option data-countryCode="NC" value="687">  +687</option>
                                <option data-countryCode="NZ" value="64">  +64</option>
                                <option data-countryCode="NI" value="505"> +505</option>
                                <option data-countryCode="NE" value="227"> +227</option>
                                <option data-countryCode="NG" value="234"> +234</option>
                                <option data-countryCode="NU" value="683"> +683</option>
                                <option data-countryCode="NF" value="672">  +672</option>
                                <option data-countryCode="NP" value="670">  +670</option>
                                <option data-countryCode="NO" value="47"> +47</option>
                                <option data-countryCode="OM" value="968"> +968</option>
                                <option data-countryCode="PW" value="680"> +680</option>
                                <option data-countryCode="PA" value="507"> +507</option>
                                <option data-countryCode="PG" value="675">   +675</option>
                                <option data-countryCode="PY" value="595"> +595</option>
                                <option data-countryCode="PE" value="51"> +51</option>
                                <option data-countryCode="PH" value="63"> +63</option>
                                <option data-countryCode="PL" value="48"> +48</option>
                                <option data-countryCode="PT" value="351"> +351</option>
                                <option data-countryCode="PR" value="1787">  +1787</option>
                                <option data-countryCode="QA" value="974"> +974</option>
                                <option data-countryCode="RE" value="262"> +262</option>
                                <option data-countryCode="RO" value="40"> +40</option>
                                <option data-countryCode="RU" value="7"> +7</option>
                                <option data-countryCode="RW" value="250"> +250</option>
                                <option data-countryCode="SM" value="378">  +378</option>
                                <option data-countryCode="ST" value="239"> +239</option>
                                <option data-countryCode="SA" value="966">  +966</option>
                                <option data-countryCode="SN" value="221"> +221</option>
                                <option data-countryCode="CS" value="381"> +381</option>
                                <option data-countryCode="SC" value="248"> +248</option>
                                <option data-countryCode="SL" value="232">  +232</option>
                                <option data-countryCode="SG" value="65"> +65</option>
                                <option data-countryCode="SK" value="421">  +421</option>
                                <option data-countryCode="SI" value="386"> +386</option>
                                <option data-countryCode="SB" value="677">  +677</option>
                                <option data-countryCode="SO" value="252"> +252</option>
                                <option data-countryCode="ZA" value="27">  +27</option>
                                <option data-countryCode="ES" value="34"> +34</option>
                                <option data-countryCode="LK" value="94">  +94</option>
                                <option data-countryCode="SH" value="290"> +290</option>
                                <option data-countryCode="KN" value="1869">+1869</option>
                                <option data-countryCode="SC" value="1758"> +1758</option>
                                <option data-countryCode="SD" value="249"> +249</option>
                                <option data-countryCode="SR" value="597"> +597</option>
                                <option data-countryCode="SZ" value="268"> +268</option>
                                <option data-countryCode="SE" value="46"> +46</option>
                                <option data-countryCode="CH" value="41"> +41</option>
                                <option data-countryCode="SI" value="963"> +963</option>
                                <option data-countryCode="TW" value="886"> +886</option>
                                <option data-countryCode="TJ" value="7"> +7</option>
                                <option data-countryCode="TH" value="66"> +66</option>
                                <option data-countryCode="TG" value="228"> +228</option>
                                <option data-countryCode="TO" value="676"> +676</option>
                                <option data-countryCode="TT" value="1868">  +1868</option>
                                <option data-countryCode="TN" value="216"> +216</option>
                                <option data-countryCode="TR" value="90"> +90</option>
                                <option data-countryCode="TM" value="993"> +993</option>
                                <option data-countryCode="TC" value="1649"> +1649</option>
                                <option data-countryCode="TV" value="688"> +688</option>
                                <option data-countryCode="UG" value="256"> +256</option>
                                <option data-countryCode="GB" value="44">+44</option>
                                <option data-countryCode="UA" value="380"> +380</option>
                                <option data-countryCode="AE" value="971">+971</option>
                                <option data-countryCode="UY" value="598"> +598</option>
                                <option data-countryCode="US" value="1"> +1</option>
                                <option data-countryCode="UZ" value="7"> +7</option>
                                <option data-countryCode="VU" value="678"> +678</option>
                                <option data-countryCode="VA" value="379">  +379</option>
                                <option data-countryCode="VE" value="58"> +58</option>
                                <option data-countryCode="VN" value="84"> +84</option>
                                <option data-countryCode="VG" value="1284">  +1284</option>
                                <option data-countryCode="VI" value="1340"> +1340</option>
                                <option data-countryCode="WF" value="681"> +681</option>
                                <option data-countryCode="YE" value="969">+969</option>
                                <option data-countryCode="YE" value="967">+967</option>
                                <option data-countryCode="ZM" value="260">+260</option>
                                <option data-countryCode="ZW" value="263"> +263</option>

                            </select>
                        </div>

                        <div class="col-sm-8 padding-right-0" >

                            <input type="text" name="home" value="{!! $user->home !!}"  class="form-control"  required>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">мобильный</label>
                    <div class="col-sm-8">
                        <div class="col-sm-4 padding-left-0" >
                            <select name="countryCode" id="countryCode"  class="form-control"   required>
                                <option  value="" disabled selected>Код</option>
                                <option data-countryCode="DZ" value="213">+213</option>
                                <option data-countryCode="AD" value="376"> +376</option>
                                <option data-countryCode="AO" value="244"> +244</option>
                                <option data-countryCode="AI" value="1264"> +1264</option>
                                <option data-countryCode="AG" value="1268">+1268</option>
                                <option data-countryCode="PAK" value="92">+92</option>
                                <option data-countryCode="AR" value="54"> +54</option>
                                <option data-countryCode="AM" value="374"> +374</option>
                                <option data-countryCode="AW" value="297"> +297</option>
                                <option data-countryCode="AU" value="61"> +61</option>
                                <option data-countryCode="AT" value="43"> +43</option>
                                <option data-countryCode="AZ" value="994"> +994</option>
                                <option data-countryCode="BS" value="1242"> +1242</option>
                                <option data-countryCode="BH" value="973"> +973</option>
                                <option data-countryCode="BD" value="880"> +880</option>
                                <option data-countryCode="BB" value="1246"> +1246</option>
                                <option data-countryCode="BY" value="375"> +375</option>
                                <option data-countryCode="BE" value="32"> +32</option>
                                <option data-countryCode="BZ" value="501"> +501</option>
                                <option data-countryCode="BJ" value="229"> +229</option>
                                <option data-countryCode="BM" value="1441"> +1441</option>
                                <option data-countryCode="BT" value="975"> +975</option>
                                <option data-countryCode="BO" value="591"> +591</option>
                                <option data-countryCode="BA" value="387">  +387</option>
                                <option data-countryCode="BW" value="267"> +267</option>
                                <option data-countryCode="BR" value="55"> +55</option>
                                <option data-countryCode="BN" value="673"> +673</option>
                                <option data-countryCode="BG" value="359"> +359</option>
                                <option data-countryCode="BF" value="226"> Faso +226</option>
                                <option data-countryCode="BI" value="257"> +257</option>
                                <option data-countryCode="KH" value="855"> +855</option>
                                <option data-countryCode="CM" value="237"> +237</option>
                                <option data-countryCode="CA" value="1"> +1</option>
                                <option data-countryCode="CV" value="238"> +238</option>
                                <option data-countryCode="KY" value="1345">  +1345</option>
                                <option data-countryCode="CF" value="236">   +236</option>
                                <option data-countryCode="CL" value="56"> +56</option>
                                <option data-countryCode="CN" value="86"> +86</option>
                                <option data-countryCode="CO" value="57"> +57</option>
                                <option data-countryCode="KM" value="269"> +269</option>
                                <option data-countryCode="CG" value="242"> +242</option>
                                <option data-countryCode="CK" value="682">  +682</option>
                                <option data-countryCode="CR" value="506">  +506</option>
                                <option data-countryCode="HR" value="385"> +385</option>
                                <option data-countryCode="CU" value="53"> +53</option>
                                <option data-countryCode="CY" value="90392">  +90392</option>
                                <option data-countryCode="CY" value="357">  +357</option>
                                <option data-countryCode="CZ" value="42">  +42</option>
                                <option data-countryCode="DK" value="45"> +45</option>
                                <option data-countryCode="DJ" value="253"> +253</option>
                                <option data-countryCode="DM" value="1809"> +1809</option>
                                <option data-countryCode="DO" value="1809">  +1809</option>
                                <option data-countryCode="EC" value="593"> +593</option>
                                <option data-countryCode="EG" value="20"> +20</option>
                                <option data-countryCode="SV" value="503">  +503</option>
                                <option data-countryCode="GQ" value="240">  +240</option>
                                <option data-countryCode="ER" value="291"> +291</option>
                                <option data-countryCode="EE" value="372"> +372</option>
                                <option data-countryCode="ET" value="251"> +251</option>
                                <option data-countryCode="FK" value="500">  +500</option>
                                <option data-countryCode="FO" value="298">  +298</option>
                                <option data-countryCode="FJ" value="679"> +679</option>
                                <option data-countryCode="FI" value="358"> +358</option>
                                <option data-countryCode="FR" value="33"> +33</option>
                                <option data-countryCode="GF" value="594">  +594</option>
                                <option data-countryCode="PF" value="689">  +689</option>
                                <option data-countryCode="GA" value="241"> +241</option>
                                <option data-countryCode="GM" value="220"> +220</option>
                                <option data-countryCode="GE" value="7880"> +7880</option>
                                <option data-countryCode="DE" value="49"> +49</option>
                                <option data-countryCode="GH" value="233"> +233</option>
                                <option data-countryCode="GI" value="350"> +350</option>
                                <option data-countryCode="GR" value="30"> +30</option>
                                <option data-countryCode="GL" value="299"> +299</option>
                                <option data-countryCode="GD" value="1473"> +1473</option>
                                <option data-countryCode="GP" value="590"> +590</option>
                                <option data-countryCode="GU" value="671"> +671</option>
                                <option data-countryCode="GT" value="502"> +502</option>
                                <option data-countryCode="GN" value="224"> +224</option>
                                <option data-countryCode="GW" value="245">  +245</option>
                                <option data-countryCode="GY" value="592"> +592</option>
                                <option data-countryCode="HT" value="509"> +509</option>
                                <option data-countryCode="HN" value="504"> +504</option>
                                <option data-countryCode="HK" value="852">  +852</option>
                                <option data-countryCode="HU" value="36"> +36</option>
                                <option data-countryCode="IS" value="354"> +354</option>
                                <option data-countryCode="IN" value="91"> +91</option>
                                <option data-countryCode="ID" value="62"> +62</option>
                                <option data-countryCode="IR" value="98"> +98</option>
                                <option data-countryCode="IQ" value="964"> +964</option>
                                <option data-countryCode="IE" value="353"> +353</option>
                                <option data-countryCode="IL" value="972"> +972</option>
                                <option data-countryCode="IT" value="39"> +39</option>
                                <option data-countryCode="JM" value="1876"> +1876</option>
                                <option data-countryCode="JP" value="81"> +81</option>
                                <option data-countryCode="JO" value="962"> +962</option>
                                <option data-countryCode="KZ" value="7"> +7</option>
                                <option data-countryCode="KE" value="254"> +254</option>
                                <option data-countryCode="KI" value="686"> +686</option>
                                <option data-countryCode="KP" value="850">  +850</option>
                                <option data-countryCode="KR" value="82">  +82</option>
                                <option data-countryCode="KW" value="965"> +965</option>
                                <option data-countryCode="KG" value="996"> +996</option>
                                <option data-countryCode="LA" value="856"> +856</option>
                                <option data-countryCode="LV" value="371"> +371</option>
                                <option data-countryCode="LB" value="961"> +961</option>
                                <option data-countryCode="LS" value="266"> +266</option>
                                <option data-countryCode="LR" value="231"> +231</option>
                                <option data-countryCode="LY" value="218"> +218</option>
                                <option data-countryCode="LI" value="417"> +417</option>
                                <option data-countryCode="LT" value="370"> +370</option>
                                <option data-countryCode="LU" value="352"> +352</option>
                                <option data-countryCode="MO" value="853"> +853</option>
                                <option data-countryCode="MK" value="389"> +389</option>
                                <option data-countryCode="MG" value="261"> +261</option>
                                <option data-countryCode="MW" value="265"> +265</option>
                                <option data-countryCode="MY" value="60"> +60</option>
                                <option data-countryCode="MV" value="960"> +960</option>
                                <option data-countryCode="ML" value="223"> +223</option>
                                <option data-countryCode="MT" value="356"> +356</option>
                                <option data-countryCode="MH" value="692">  +692</option>
                                <option data-countryCode="MQ" value="596"> +596</option>
                                <option data-countryCode="MR" value="222"> +222</option>
                                <option data-countryCode="YT" value="269"> +269</option>
                                <option data-countryCode="MX" value="52"> +52</option>
                                <option data-countryCode="FM" value="691"> +691</option>
                                <option data-countryCode="MD" value="373"> +373</option>
                                <option data-countryCode="MC" value="377"> +377</option>
                                <option data-countryCode="MN" value="976"> +976</option>
                                <option data-countryCode="MS" value="1664"> +1664</option>
                                <option data-countryCode="MA" value="212"> +212</option>
                                <option data-countryCode="MZ" value="258"> +258</option>
                                <option data-countryCode="MN" value="95"> +95</option>
                                <option data-countryCode="NA" value="264"> +264</option>
                                <option data-countryCode="NR" value="674"> +674</option>
                                <option data-countryCode="NP" value="977"> +977</option>
                                <option data-countryCode="NL" value="31"> +31</option>
                                <option data-countryCode="NC" value="687">  +687</option>
                                <option data-countryCode="NZ" value="64">  +64</option>
                                <option data-countryCode="NI" value="505"> +505</option>
                                <option data-countryCode="NE" value="227"> +227</option>
                                <option data-countryCode="NG" value="234"> +234</option>
                                <option data-countryCode="NU" value="683"> +683</option>
                                <option data-countryCode="NF" value="672">  +672</option>
                                <option data-countryCode="NP" value="670">  +670</option>
                                <option data-countryCode="NO" value="47"> +47</option>
                                <option data-countryCode="OM" value="968"> +968</option>
                                <option data-countryCode="PW" value="680"> +680</option>
                                <option data-countryCode="PA" value="507"> +507</option>
                                <option data-countryCode="PG" value="675">   +675</option>
                                <option data-countryCode="PY" value="595"> +595</option>
                                <option data-countryCode="PE" value="51"> +51</option>
                                <option data-countryCode="PH" value="63"> +63</option>
                                <option data-countryCode="PL" value="48"> +48</option>
                                <option data-countryCode="PT" value="351"> +351</option>
                                <option data-countryCode="PR" value="1787">  +1787</option>
                                <option data-countryCode="QA" value="974"> +974</option>
                                <option data-countryCode="RE" value="262"> +262</option>
                                <option data-countryCode="RO" value="40"> +40</option>
                                <option data-countryCode="RU" value="7"> +7</option>
                                <option data-countryCode="RW" value="250"> +250</option>
                                <option data-countryCode="SM" value="378">  +378</option>
                                <option data-countryCode="ST" value="239"> +239</option>
                                <option data-countryCode="SA" value="966">  +966</option>
                                <option data-countryCode="SN" value="221"> +221</option>
                                <option data-countryCode="CS" value="381"> +381</option>
                                <option data-countryCode="SC" value="248"> +248</option>
                                <option data-countryCode="SL" value="232">  +232</option>
                                <option data-countryCode="SG" value="65"> +65</option>
                                <option data-countryCode="SK" value="421">  +421</option>
                                <option data-countryCode="SI" value="386"> +386</option>
                                <option data-countryCode="SB" value="677">  +677</option>
                                <option data-countryCode="SO" value="252"> +252</option>
                                <option data-countryCode="ZA" value="27">  +27</option>
                                <option data-countryCode="ES" value="34"> +34</option>
                                <option data-countryCode="LK" value="94">  +94</option>
                                <option data-countryCode="SH" value="290"> +290</option>
                                <option data-countryCode="KN" value="1869">+1869</option>
                                <option data-countryCode="SC" value="1758"> +1758</option>
                                <option data-countryCode="SD" value="249"> +249</option>
                                <option data-countryCode="SR" value="597"> +597</option>
                                <option data-countryCode="SZ" value="268"> +268</option>
                                <option data-countryCode="SE" value="46"> +46</option>
                                <option data-countryCode="CH" value="41"> +41</option>
                                <option data-countryCode="SI" value="963"> +963</option>
                                <option data-countryCode="TW" value="886"> +886</option>
                                <option data-countryCode="TJ" value="7"> +7</option>
                                <option data-countryCode="TH" value="66"> +66</option>
                                <option data-countryCode="TG" value="228"> +228</option>
                                <option data-countryCode="TO" value="676"> +676</option>
                                <option data-countryCode="TT" value="1868">  +1868</option>
                                <option data-countryCode="TN" value="216"> +216</option>
                                <option data-countryCode="TR" value="90"> +90</option>
                                <option data-countryCode="TM" value="993"> +993</option>
                                <option data-countryCode="TC" value="1649"> +1649</option>
                                <option data-countryCode="TV" value="688"> +688</option>
                                <option data-countryCode="UG" value="256"> +256</option>
                                <option data-countryCode="GB" value="44">+44</option>
                                <option data-countryCode="UA" value="380"> +380</option>
                                <option data-countryCode="AE" value="971">+971</option>
                                <option data-countryCode="UY" value="598"> +598</option>
                                <option data-countryCode="US" value="1"> +1</option>
                                <option data-countryCode="UZ" value="7"> +7</option>
                                <option data-countryCode="VU" value="678"> +678</option>
                                <option data-countryCode="VA" value="379">  +379</option>
                                <option data-countryCode="VE" value="58"> +58</option>
                                <option data-countryCode="VN" value="84"> +84</option>
                                <option data-countryCode="VG" value="1284">  +1284</option>
                                <option data-countryCode="VI" value="1340"> +1340</option>
                                <option data-countryCode="WF" value="681"> +681</option>
                                <option data-countryCode="YE" value="969">+969</option>
                                <option data-countryCode="YE" value="967">+967</option>
                                <option data-countryCode="ZM" value="260">+260</option>
                                <option data-countryCode="ZW" value="263"> +263</option>

                            </select>
                        </div>

                        <div class="col-sm-8 padding-right-0" >
                            <input type="text" name="mobile" value="{!! $user->mobile !!}"  class="form-control"  >
                            @if($user->mobile !== ''  && $user->mobile_status==0) <span class="text-danger"  style="display:none;">непроверенный (<a class="cursor-pointer" id="sendverificationcode" onclick="sendverificationcode();">Отправить код подтверждения</a>)</span> @endif
                            @if($user->mobile !== ''  &&  $user->mobile_status==1) <span class=" fa fa-check text-success "  style="display:none;">Проверенный</span> @endif

                        </div>
                    </div>
                </div>



            </div>
        </div>




    <h4 class="col-sm-push-1"> дополнительные детали</h4>
        <hr />
        <div class="col-sm-12">
            <div class="col-sm-8 col-sm-push-1">

                <br />
                <div class="row">
                    <label class="col-sm-4">Статус занятости</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="employment_status" id="employment_status" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                <option value="1">Занятые</option>
                                <option value="2">Безработные</option>
                                <option value="3">Частный предприниматель</option>
                                <option value="4">На пенсии</option>
                                <option value="5">Ученик</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Характер деятельности</label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="nature_of_business" id="nature_of_business" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                <option value="1">  счетоводство</option>
                                <option value="2">  Администратор / секретари</option>
                                <option value="3">  сельское хозяйство</option>
                                <option value="4">  Финансовые услуги - Банки</option>
                                <option value="5">  Питание / Гостеприимство</option>
                                <option value="6">  Креатив / Медиа</option>
                                <option value="7">  образование</option>
                                <option value="8">  Службы спасения</option>
                                <option value="9">  инженерия</option>
                                <option value="10"> Финансовые услуги - другое</option>
                                <option value="11"> Здоровье / Медицина</option>
                                <option value="12"> HM Forces</option>
                                <option value="13"> Человеческий ресурс</option>
                                <option value="14"> Финансовые услуги - Страхование</option>
                                <option value="15" > Информационные технологии</option>
                                <option value="16"> легальный</option>
                                <option value="17"> Досуг / Развлечения / Туризм</option>
                                <option value="18"> Производство</option>
                                <option value="19"> Маркетинг / PR / Реклама</option>
                                <option value="20"> Фармацевтические препараты</option>
                                <option value="21"> Недвижимость / Строительство / Торговля</option>
                                <option value="22"> Розничная торговля</option>
                                <option value="23"> Продажи</option>
                                <option value="24"> Социальная помощь / Услуги</option>
                                <option value="25"> связь</option>
                                <option value="26"> Транспорт / логистика</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Расчетный годовой доход </label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="annual_income" id="annual_income" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                <option value="1">  Less than $15,000</option>
                                <option value="2">  $15,000 – $24,999</option>
                                <option value="3">  $25,000 – $49,999</option>
                                <option value="4">  $50,000 – $99,000</option>
                                <option value="5">  $100,000 – $249,000</option>
                                <option value="6">  $250,000 or more</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4">Расчетная чистая стоимость </label>
                    <div class="col-sm-8">
                        <div class="controls">
                            <select class="form-control" name="net_worth" id="net_worth" required >
                                <option value="" disabled selected >- Выбрать -</option>
                                <option value="1">  Less than $15,000</option>
                                <option value="2">  $15,000 – $24,999</option>
                                <option value="3">  $25,000 – $49,999</option>
                                <option value="4">  $50,000 – $99,000</option>
                                <option value="5">  $100,000 – $249,000</option>
                                <option value="6">  $250,000 or more</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br />
                <div class="row">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 ">
                        <div class="controls">
                             <input class="btn btn-success form-control" type="submit" value="Обновить" />

                        </div>
                    </div>
                </div>

                <br />

            {!! Form::close() !!}

            </div>
        </div>

    </div>
</div>





<script type="text/javascript">

 var monthNames = [ "","январь", "февраль", "марш", "апрель", "май", "июнь",
    "июль", "августейший", "сентябрь", "октября", "ноябрь", "Декабрь" ];

for (i = new Date().getFullYear(); i > 1900; i--){
    $('#years').append($('<option />').val(i).html(i));
}

for (i = 1; i < 13; i++){
    $('#months').append($('<option />').val(i).html(monthNames[i]));
}
 updateNumberOfDays();

$('#years, #months').on("change", function(){
    updateNumberOfDays();
});



function updateNumberOfDays(){
    $('#days').html('');
    month=$('#months').val();
    year=$('#years').val();
    days=daysInMonth(month, year);

    for(i=1; i < days+1 ; i++){
            $('#days').append($('<option />').val(i).html(i));
    }
}

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}

</script>
<script type="text/javascript">

<?PHP $location = GeoIP::getLocation(); ?>

var geocountry = "<?PHP echo $location['iso_code'] ?>";

$('option[data-countryCode="'+geocountry+'"]').prop('selected', true);


function countryfun()
{
        var datacountry= $('select#country').find('option:selected').attr('data-countryCode');
        $('option[data-countryCode="'+datacountry+'"]').prop('selected', true);
}


</script>
<script>

    function changeusername(){
            $('span#changeusername').css('display','none');
            $('span#checkusername').css('display','inline-block');
            $('input#form-username').removeAttr('readonly');
      };
    function changeemail(){
            $('span#changeemail').css('display','none');
            $('span#checkemail').css('display','inline-block');
            $('input#form-email').removeAttr('readonly');
      };

      function checkusername(){
          var username = $("input#form-username").val();
           //var base_url = $("input#base_url").val();
         //  alert(username + base_url);
          $.ajax({
            type: "get",
              url :"/newcheckusername/"+username,
              success:function(result){
                  if(result=='true'){
                //       alert('in use');
                $("label[for='username']").html("Этот пользователь используется");
                $("label[for='username']").css("display", "inline-block");
                $("label[for='username']").css("color", "red");
                  }else if(result=='false'){
                $("label[for='username']").html("Available");
                $("label[for='username']").css("color", "green");
                //       alert('u can use it ');
                  }
              },
                error:function(result){
                $("#usernamecheck2").html("Error (13) Try Again");
              }
          });

      };

      function checkemail(){
          var email = $("input#form-email").val();
           //var base_url = $("input#base_url").val();
         //  alert(username + base_url);
          $.ajax({
            type: "get",
              url :"/newcheckemail/"+email,
              success:function(result){
                  if(result=='true'){
                //       alert('in use');
                $("label[for='email']").html("Этот адрес электронной почты используется");
                $("label[for='email']").css("display", "inline-block");
                $("label[for='email']").css("color", "red");
                  }else if(result=='false'){
                $("label[for='email']").html("Доступный");
                $("label[for='email']").css("color", "green");
                //       alert('u can use it ');
                  }
              },
                error:function(result){
                $("#usernamecheck2").html("Error (13) Try Again");
              }
          });

      };

function sendverificationmail(){

          $.ajax({
            type: "get",
              url :"/sendverificationmail/",
              success:function(result){
                  if(result=='true'){
                    $('a#sendverificationmail').after('<span class="text-success">Отправлено письмо активации</span>');
                    $('a#sendverificationmail').remove();
                    $('span#sendverificationmail').remove();
                  }else if(result=='false'){
                    $('a#sendverificationmail').text('Try Again');
                  }
              },
                error:function(result){
                $("#usernamecheck2").html("Error (13) Try Again");
              }
          });

}

function sendverificationcode(){


}

$(document).ready(function(){

title_val=<?PHP echo $user->title; ?>;
if(title_val>=0){
  $("select#title").val(title_val);
}
gender=<?PHP if($user->gender !== Null){echo $user->gender;}else{echo '"none"';} ?>;
if(gender>=0){
  $("select#gender").val(gender);
}
birthday=<?PHP if($user->birthday !== Null){echo $user->birthday;}else{echo '"none"';} ?>;

if(birthday>=0){
  $("select#days").val(birthday);
}
birthmonth=<?PHP if($user->birthmonth !== Null){echo $user->birthmonth;}else{echo '"none"';} ?>;

if(birthmonth>=0){
  $("select#months").val(birthmonth);
}
birthyear=<?PHP if($user->birthyear !== Null){echo $user->birthyear;}else{echo '"none"';} ?>;

if(birthyear>=0){
  $("select#years").val(birthyear);
}
country="<?PHP if($user->country !== Null){echo $user->country;}else{echo '"none"';} ?>";

if(country !== null ){
  $("select#country").val(country);
}
countryCode=<?PHP if($user->country_code !== Null){echo $user->country_code;}else{echo '"none"';} ?>;

if(countryCode>=0){
  $("select#countryCode").val(countryCode);
}
employment_status=<?PHP if($user->employment_status !== Null){echo $user->employment_status;}else{echo '"none"';} ?>;

if(employment_status>=0){
  $("select#employment_status").val(employment_status);
}
nature_of_business=<?PHP if($user->nature_of_business !== Null){echo $user->nature_of_business;}else{echo '"none"';} ?>;

if(nature_of_business>=0){
  $("select#nature_of_business").val(nature_of_business);
}
net_worth=<?PHP if($user->net_worth !== Null){echo $user->net_worth;}else{echo '"none"';} ?>;

if(net_worth>=0){
  $("select#net_worth").val(net_worth);
}
annual_income=<?PHP if($user->annual_income !== Null){echo $user->annual_income;}else{echo '"none"';} ?>;

if(annual_income>=0){
  $("select#annual_income").val(annual_income);
}

  });

</script>






            <!--End content-->
            </div>
        </div>

    </div>



@stop
