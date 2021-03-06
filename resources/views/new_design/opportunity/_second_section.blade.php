<!-- Mt About Section of the Page -->
<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="txt">
            {{-- <h2>{{ $guide_text->title }}</h2> --}}
            {{-- <p>{{ $guide_text->text_body }}</p> --}}
            <h2> @lang('app.title_opportunity')</h2>
            <p> С компанией Januya Consulting Вы можете как укрепить свое здоровье, так и улучшить свое финансовое состояние.  </p>
            <p> Компания предлагает Вам широкие возможности для хорошего заработка. Все виды доходов которые предлагаются компанией являются щедрыми и имеют самые лучшие условия.  </p>
            <p> Активно работая, Вы можете зарабатывать от 616 500 KZT и до неограниченной суммы, которая напрямую зависит от ваших активных действии. </p>
            <p> Уже сегодня Вы можете начать зарабатывать по двум видам дохода:
              <br> 1. Активный доход - больше действии, больше дохода 
              <br> 2. Пассивный доход - меньше действии, стабильный доход</p>
            <p> Помимо заработка, в возможности компании входят различные социальные программы. 
              <br>  В рамках специальных программ компании Вы можете приобрести дом и автомобиль в рассрочку с уникальными условиями.             
            </p>
            <div class="opportunity_content">
              <!DOCTYPE html>
                <html>
                  <head>
                  </head>
                  <body>                  
                    <p><strong> @lang('app.packets'):</strong></p>
                    <div class="packets_container">
                      <div class="packets_mob">
                        <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
                          <thead class="thead-dark" style="display: none;">
                            <tr >
                              <th style="flex-basis: 33.3333%;">Name</th>
                              <th style="flex-basis: 33.3333%;">Color</th>
                              <th style="flex-basis: 33.3333%;">Taste</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr style="flex-direction: column; padding: 20px; background-color: #cd7f32;">
                              <td style="flex-basis: 33.3333%; border: 0px; margin-bottom: 20px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.packet'):</span> Bronze</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.cost'):</span> 50&nbsp;000 KZT</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.volume'):</span> 100  PV</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.status'):</span> @lang('app.status_partner')</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.product_count'):</span> @lang('app.product_count_4')</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.limit_bonus'):</span> 250&nbsp;000 KZT</td>
                            </tr>
                          </tbody>
                        </table>
                        {{-- <p> @lang('app.packet'): <span style="font-weight: 700">Bronze</span> </p>
                        <p> @lang('app.cost'): <span style="font-weight: 700">50&nbsp;000 KZT</span>. </p> 
                        <p> @lang('app.volume'): <span style="font-weight: 700">100  PV</span>. </p>
                        <p> @lang('app.status'): <span style="font-weight: 700"> @lang('app.status_partner') </span>. </p>
                        <p> @lang('app.product_count'): <span style="font-weight: 700"> @lang('app.product_count_4') </span>. </p>
                        <p> @lang('app.limit_bonus'): <span style="font-weight: 700"> 250&nbsp;000 KZT</span>.</p> --}}
                      </div>
                      <div class="packets_mob">
                        <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
                          <thead class="thead-dark" style="display: none;">
                            <tr >
                              <th style="flex-basis: 33.3333%;">Name</th>
                              <th style="flex-basis: 33.3333%;">Color</th>
                              <th style="flex-basis: 33.3333%;">Taste</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr style="flex-direction: column; padding: 20px; background-color: silver;">
                              <td style="flex-basis: 33.3333%; border: 0px; margin-bottom: 20px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.packet'):</span> Silver</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.cost'):</span> 100&nbsp;000 KZT</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.volume'):</span> 200  PV</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.status'):</span> @lang('app.status_partner')</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.product_count'):</span> @lang('app.product_count_8')</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.limit_bonus'):</span> 500&nbsp;000 KZT</td>
                            </tr>
                          </tbody>
                        </table>
                        {{-- <p> @lang('app.packet'): <span style="font-weight: 700">Silver</span> </p>
                        <p> @lang('app.cost'): <span style="font-weight: 700">100&nbsp;000 KZT</span>. </p> 
                        <p> @lang('app.volume'): <span style="font-weight: 700">200 PV</span>. </p>
                        <p> @lang('app.status'): <span style="font-weight: 700"> @lang('app.status_partner') </span>. </p>
                        <p> @lang('app.product_count'): <span style="font-weight: 700"> @lang('app.product_count_8') </span>. </p>
                        <p> @lang('app.limit_bonus'): <span style="font-weight: 700"> 500&nbsp;000 KZT</span>.</p> --}}
                      </div>
                      <div class="packets_mob">
                        <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
                          <thead class="thead-dark" style="display: none;">
                            <tr >
                              <th style="flex-basis: 33.3333%;">Name</th>
                              <th style="flex-basis: 33.3333%;">Color</th>
                              <th style="flex-basis: 33.3333%;">Taste</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr style="flex-direction: column; padding: 20px; background-color: gold;">
                              <td style="flex-basis: 33.3333%; border: 0px; margin-bottom: 20px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.packet'):</span> Gold</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.cost'):</span> 150&nbsp;000 KZT</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.volume'):</span> 300  PV</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.status'):</span> @lang('app.status_partner')</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.product_count'):</span> @lang('app.product_count_12')</td>
                              <td style="flex-basis: 33.3333%; border: 0px; color: #fff; font-weight: bold;"><span class="table-responsive-stack-thead" style="color: #494949;">@lang('app.limit_bonus'):</span> Нет ограничении</td>
                            </tr>
                          </tbody>
                        </table>
                        {{-- <p> @lang('app.packet'): <span style="font-weight: 700">Gold</span> </p>
                        <p> @lang('app.cost'): <span style="font-weight: 700">150&nbsp;000 KZT</span>. </p> 
                        <p> @lang('app.volume'): <span style="font-weight: 700">300  PV</span>. </p>
                        <p> @lang('app.status'): <span style="font-weight: 700"> @lang('app.status_partner') </span>. </p>
                        <p> @lang('app.product_count'): <span style="font-weight: 700"> @lang('app.product_count_12') </span>. </p>
                        <p> @lang('app.limit_bonus'): <span style="font-weight: 700"> Нет ограничении </span>.</p> --}}
                      </div>                    
                    </div>                  

                    <p><strong> @lang('app.incomes')</strong></p>
                    <ol>
                      <li style="font-size: 24px; font-weight: 600;">
                        <p><strong> @lang('app.active_income')</strong></p>
                      </li>
                    </ol>
                    <p> @lang('app.active_income_text')</p>
                    <div class="table-responsive">
                      <table class="table" style="border-collapse: collapse; width: 100%; text-align:center; font-weight: 700;" border="1">
                        <tbody>
                          <tr>
                            <td style="width: 20%;" scope="col"> @lang('app.packets')</td>
                            <td style="width: 10%;">1</td>
                            <td style="width: 10%;">2</td>
                            <td style="width: 10%;">3</td>
                            <td style="width: 10%;">4</td>
                            <td style="width: 10%;">5</td>
                            <td style="width: 10%;">6</td>
                            <td style="width: 10%;">7</td>
                            <td style="width: 10%;">8</td>
                          </tr>
                          <tr>
                            <td style="width: 20%;"> Bronze <br> 50 000 KZT </td>
                            <td style="width: 10%;">20% <br> 10 000 </td>
                            <td style="width: 10%;">3% <br> 1 500 </td>
                            <td style="width: 10%;">3% <br> 1 500 </td>
                            <td style="width: 10%;">3% <br> 1 500 </td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>
                          </tr>
                          <tr>
                            <td style="width: 20%;"> Silver <br> 100 000 KZT </td>
                            <td style="width: 10%;">20% <br> 20 000 </td>
                            <td style="width: 10%;">3% <br> 3 000</td>
                            <td style="width: 10%;">3% <br> 3 000</td>
                            <td style="width: 10%;">3% <br> 3 000</td>
                            <td style="width: 10%;">3% <br> 3 000</td>
                            <td style="width: 10%;">3% <br> 3 000</td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>                            
                          </tr>
                          <tr>
                            <td style="width: 20%;" scope="col"> Gold <br> 150 000 KZT </td>
                            <td style="width: 10%;">20% <br> 30 000 </td>
                            <td style="width: 10%;">3% <br> 4 500</td>
                            <td style="width: 10%;">3% <br> 4 500</td>
                            <td style="width: 10%;">3% <br> 4 500</td>
                            <td style="width: 10%;">3% <br> 4 500</td>
                            <td style="width: 10%;">3% <br> 4 500</td>
                            <td style="width: 10%;">3% <br> 4 500</td>
                            <td style="width: 10%;">3% <br> 4 500</td>                          
                          </tr>                        
                        </tbody>
                      </table>
                      {{-- <img src="/custom2/img/income_table.jpg" alt=""> --}}
                      <span>* Максимальный уровень Активного бонуса зависит от Вашего пакета</span>
                    </div>                                    
                    <ol start="2">
                      <li style="font-size: 24px; font-weight: 600;">
                        <p><strong> @lang('app.passive_income')</strong></p>
                      </li>
                    </ol>
                    <p> @lang('app.passive_income_text') </p>
                    
                    <div class="table-responsive">
                      <table class="table" style="border-collapse: collapse; width: 100%; text-align:center; font-weight: 700;" border="1">
                        <tbody>
                          <tr>
                            <td style="width: 20%;" scope="col"> @lang('app.packets')</td>
                            <td style="width: 10%;">1</td>
                            <td style="width: 10%;">2</td>
                            <td style="width: 10%;">3</td>
                            <td style="width: 10%;">4</td>
                            <td style="width: 10%;">5</td>
                            <td style="width: 10%;">6</td>
                            <td style="width: 10%;">7</td>
                            <td style="width: 10%;">8</td>
                          </tr>
                          <tr>
                            <td style="width: 20%;"> Bronze <br> 12 500 KZT </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>
                          </tr>
                          <tr>
                            <td style="width: 20%;"> Silver <br> 12 500 KZT </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">-</td>
                            <td style="width: 10%;">-</td>                            
                          </tr>
                          <tr>
                            <td style="width: 20%;" scope="col"> Gold <br> 12 500 KZT </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>
                            <td style="width: 10%;">8% <br> 1 000 </td>                         
                          </tr>                        
                        </tbody>
                      </table>
                      {{-- <img src="/custom2/img/income_table.jpg" alt=""> --}}

                      <span>* Максимальный уровень Пассивного бонуса зависит от Вашего пакета</span>
                      <span>* Минимальная сумма ежемесячной покупки 12 500 KZT</span>
                    </div>                                       
                  </body>
                </html>
            </div>
          </div>
          <p style="white-space: pre-line;">
            <strong style="white-space: pre-line;">
              @lang('app.future_with_company')
              {{-- {{ $guide_text->author_full_name }} --}}
            </strong>
            {{-- {{ $guide_text->author_responsibility }} --}}
          </p>
          <div class="mt-follow-holder">
            <span class="title">@lang('app.subscribe')</span>
            <!-- Social Network of the Page -->
            <ul class="list-unstyled social-network">
              {{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> --}}
              {{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> --}}
              {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              {{-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
              <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
            <!-- Social Network of the Page end -->
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Mt About Section of the Page -->