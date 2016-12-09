<h2 id="Points-Badges">Оноо</h2>

<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->points->points >= 100)
                <img src="{{ ShowPointsFor100() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 100 оноо авсан</h4>
            @else
                <img src="{{ ShowPointsFor100Shaded() }}" class="ui small circular image">
                <h4 id="badges-description">Та 100 оноотой</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->points->points >= 250)
                <img src="{{ ShowPointsFor250() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 250 оноотой</h4>
            @else
                <img src="{{ ShowPointsFor250Shaded() }}" class="ui small circular image">
                <h4 id="badges-description">Та 250 оноотой</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->points->points >= 500)
                <img src="{{ ShowPointsFor500() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 500 оноотой</h4>
            @else
                <img src="{{ ShowPointsFor500Shaded() }}" class="ui small circular image">
                <h4 id="badges-description">Та 500 оноотой</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->points->points >= 1000)
                <img src="{{ ShowPointsFor1000() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 1000 оноотой</h4>
            @else
                <img src="{{ ShowPointsFor1000Shaded() }}" class="ui small circular image">
                <h4 id="badges-description">Та 1000 оноотой</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->points->points >= 2500)
                <img src="{{ ShowPointsFor2500() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 2500 оноотой</h4>
            @else
                <img src="{{ ShowPointsFor2500Shaded() }}" class="ui small circular image">
                <h4 id="badges-description">Та 2500 оноотой</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->points->points >= 5000)
                <img src="{{ ShowPointsFor5000() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 5000 оноотой</h4>
            @else
                <img src="{{ ShowPointsFor5000Shaded() }}" class="ui small circular image">
                <h4 id="badges-description">Та 5000 оноотой</h4>
            @endif
        </div>
    </div>
</div>



<hr><h2 id="Travel-Badges">Ажил олгогчийн цол</h2>

<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->flyers->count() >= 1)
                <img src="{{ ShowFlyerFor1() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Анхны ажил үүсгэсэн!</h4>
            @else
                <img src="{{ ShowFlyerFor1Shaded() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Анхны ажил үүсгэсэн</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->flyers->count() >= 5)
                <img src="{{ ShowFlyerFor5() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 5 ажил үүсгэсэн!</h4>
            @else
                <img src="{{ ShowFlyerFor5Shaded() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 5 ажил үүсгэсэн</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->flyers->count() >= 10)
                <img src="{{ ShowFlyerFor10() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 20 ажил үүсгэсэн!</h4>
            @else
                <img src="{{ ShowFlyerFor10Shaded() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 20 ажил үүсгэсэн</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->flyers->count() >= 25)
                <img src="{{ ShowFlyerFor25() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 25 ажил үүсгэсэн!</h4>
            @else
                <img src="{{ ShowFlyerFor25Shaded() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 25 ажил үүсгэсэн</h4>
            @endif
        </div>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <div class="row">
            @if ($user->flyers->count() >= 50)
                <img src="{{ ShowFlyerFor50() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 50 ажил үүсгэсэн!</h4>
            @else
                <img src="{{ ShowFlyerFor50Shaded() }}" class="ui small circular image" id="Badge">
                <h4 id="badges-description">Та 50 ажил үүсгэсэн</h4>
            @endif
        </div>
    </div>
</div>


<hr><h2 id="Travel-Badges">Үнэнч хэрэглэгч</h2>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
            @if ($user->userSinceInDays() >= 7)
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <img src="{{ ShowSignedUpFor7Days() }}" class="ui small circular image" id="Badge">
                    <h4 id="badges-description">7 хоног хэрэглэсэн! </h4>
                </div>
            @else
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <img src="{{ ShowSignedUpFor7DaysShaded() }}" class="ui small circular image" id="Badge">
                    <h4 id="badges-description">7 хоног хэрэглэсэн </h4>
                </div>
            @endif

            @if ($user->userSinceInDays() >= 30)
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <img src="{{ ShowSignedUpFor30Days() }}" class="ui small circular image" id="Badge">
                    <h4 id="badges-description">30 хоног хэрэглэсэн! </h4>
                </div>
            @else
                <div class="col-xs-6 col-sm-4 col-md-2">
                    <img src="{{ ShowSignedUpFor30DaysShaded() }}" class="ui small circular image" id="Badge">
                    <h4 id="badges-description">30 хоног хэрэглэсэн </h4>
                </div>
            @endif

                @if ($user->userSinceInDays() >= 183)
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <img src="{{ ShowSignedUpFor183Days() }}" class="ui small circular image" id="Badge">
                        <h4 id="badges-description">6 сар хэрэглэсэн! </h4>
                    </div>
                @else
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <img src="{{ ShowSignedUpFor183DaysShaded() }}" class="ui small circular image" id="Badge">
                        <h4 id="badges-description">6 сар хэрэглэсэн </h4>
                    </div>
                @endif
        </div>
    </div>
</div>
