<footer>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-sm-12">
			<ul>
                    <a href="{{ route('shop.about') }}">О магазине</a>
                </li>
                <li>
                    <a href="{{ route('shop.how-to-order') }}">Как заказать?</a>
                </li>
                <li>
                    <a href="{{ route('shop.delivery-points') }}">Пункты самовывоза</a>
                </li>
			</ul>
		</div>
		<div class="col-md-4 col-sm-12">
			<ul>
			  <li><a href="{{ URL::to('/shop') }}">Магазин</a></li>
			  <li><a href="#">Совместные покупки</a></li>
			</ul>
		</div>
		<div class="col-md-4 col-sm-12">
			<ul>
				<li>
				<img src="{{ URL::to('/src/images/etk-club-logo-static-32.png') }}" alt="ЕТК-Клуб" height="30"> 
					<a href="http://etk-club.ru" target="_blank">Вступить в ЕТК-Клуб</a>
				</li>
			</ul>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12">
			<p><strong>21market.ru | 2016</strong></p>
		</div>
	</div>
</div>
<div class="product-search-block">
<p class="text-right">
		<i class="fa fa-close fa-5x" id="close-search-window"></i>
	</p>
	<h1>Результаты поиска </h1>
	<div id="search-results">
		
	</div>
</div>
</footer>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter39261585 = new Ya.Metrika({
                    id:39261585,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
    
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39261585" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->