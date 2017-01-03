
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <strong>{{ $publicName->username }}'s</strong> Оноо
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->points->points >= 100)
                                <img src="{{ ShowPointsFor100() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">100 оноотой</h4>
                            @else
                                <img src="{{ ShowPointsFor100Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">100 оноотой</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->points->points >= 250)
                                <img src="{{ ShowPointsFor250() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">100 оноо</h4>
                            @else
                                <img src="{{ ShowPointsFor250Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">100 оноо</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->points->points >= 500)
                                <img src="{{ ShowPointsFor500() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">500 оноо</h4>
                            @else
                                <img src="{{ ShowPointsFor500Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">500 оноо</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->points->points >= 1000)
                                <img src="{{ ShowPointsFor1000() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">1000 оноо</h4>
                            @else
                                <img src="{{ ShowPointsFor1000Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">1000 оноо</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->points->points >= 2500)
                                <img src="{{ ShowPointsFor2500() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">2500 оноо</h4>
                            @else
                                <img src="{{ ShowPointsFor2500Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">2500 оноо</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->points->points >= 5000)
                                <img src="{{ ShowPointsFor5000() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">5000 оноо</h4>
                            @else
                                <img src="{{ ShowPointsFor5000Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">5000 оноо</h4>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <strong>{{ $publicName->username }}'s </strong> хямдрал олгогч
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">


                <div class="row">
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->jobs->count() >= 1)
                                <img src="{{ ShowJobFor1() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">Анхны ажлаа үүсгэсэн!</h4>
                            @else
                                <img src="{{ ShowJobFor1Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">Анхны ажлаа үүсгэсэн</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->jobs->count() >= 5)
                                <img src="{{ ShowJobFor5() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">5 хямдралын санал үүсгэсэн!</h4>
                            @else
                                <img src="{{ ShowJobFor5Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">5 хямдралын санал үүсгэсэн</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->jobs->count() >= 10)
                                <img src="{{ ShowJobFor10() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">10 хямдралын санал үүсгэсэн!</h4>
                            @else
                                <img src="{{ ShowJobFor10Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">10 хямдралын санал үүсгэсэн</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->jobs->count() >= 25)
                                <img src="{{ ShowJobFor25() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">25 хямдралын санал үүсгэсэн!</h4>
                            @else
                                <img src="{{ ShowJobFor25Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">25 хямдралын санал үүсгэсэн</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-2">
                        <div class="row">
                            @if ($publicName->jobs->count() >= 50)
                                <img src="{{ ShowJobFor50() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">50 хямдралын санал үүсгэсэн!</h4>
                            @else
                                <img src="{{ ShowJobFor50Shaded() }}" class="ui tiny circular image" id="Public-Badge">
                                <h4 id="badges-description">50 хямдралын санал үүсгэсэн</h4>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <strong>{{ $publicName->username }}'s </strong> Хэрэглэгч
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            @if ($publicName->userSinceInDays() >= 7)
                                <div class="col-xs-6 col-sm-4 col-md-2">
                                    <img src="{{ ShowSignedUpFor7Days() }}" class="ui tiny circular image" id="Public-Badge-SignedUp">
                                    <h4 id="badges-description">7 хоног хэрэглэсэн! </h4>
                                </div>
                            @else
                                <div class="col-xs-6 col-sm-4 col-md-2">
                                    <img src="{{ ShowSignedUpFor7DaysShaded() }}" class="ui tiny circular image" id="Public-Badge-SignedUp">
                                    <h4 id="badges-description">7 хоног хэрэглэсэн </h4>
                                </div>
                            @endif

                            @if ($publicName->userSinceInDays() >= 30)
                                <div class="col-xs-6 col-sm-4 col-md-2">
                                    <img src="{{ ShowSignedUpFor30Days() }}" class="ui tiny circular image" id="Public-Badge-SignedUp">
                                    <h4 id="badges-description">30 хоног хэрэглэсэн! </h4>
                                </div>
                            @else
                                <div class="col-xs-6 col-sm-4 col-md-2">
                                    <img src="{{ ShowSignedUpFor30DaysShaded() }}" class="ui tiny circular image" id="Public-Badge-SignedUp">
                                    <h4 id="badges-description">30 хоног хэрэглэсэн </h4>
                                </div>
                            @endif

                            @if ($publicName->userSinceInDays() >= 183)
                                <div class="col-xs-6 col-sm-4 col-md-2">
                                    <img src="{{ ShowSignedUpFor183Days() }}" class="ui tiny circular image" id="Public-Badge-SignedUp">
                                    <h4 id="badges-description">6 сар хэрэглэсэн! </h4>
                                </div>
                            @else
                                <div class="col-xs-6 col-sm-4 col-md-2">
                                    <img src="{{ ShowSignedUpFor183DaysShaded() }}" class="ui tiny circular image" id="Public-Badge-SignedUp">
                                    <h4 id="badges-description">6 сар хэрэглэсэн </h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>