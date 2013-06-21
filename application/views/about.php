--work in progress--

<h1>CoteWad</h1>
<br />
<h2>Collaborative Application</h2

<h2>Abstract</h2>
<p>
	In ultima perioada s-a manifestat un mare interes pentru dezvoltarea aplicatiilor ce ofera interactiune in timp real, aplicatii ce permit utilizatorilor partajarea unei resurse intr-un timp cat mai scurt.
</p>

<h2>Introducere</h2>

<h3>1.1 Scurta descriere a termenul de Aplicatie Web Real-Time</h3>
<p>
	O aplicatie Web se poate numi Real-Time daca ofera anumite functionalitati ce permit transferul de date de la un autor la un alt utilizator intr-un anumit interval de timp.
	Este de dorit ca intervalul de timp sa fie cat mai scurt, sa nu depaseasca cateva secunde pentru a nu disparea efectul de colaborare.
</p>

<h3>1.2 Aplicatii Web Similare</h3>
<ul>
	<li>
		<a href="http://qikpad.co.uk/">http://qikpad.co.uk/</a>
	</li>
	<li>
		<a href="http://www.chatcoding.net/">http://www.chatcoding.net/</a>
	</li>
	<li>
		<a href="http://etherpad.org/">http://etherpad.org/</a>
	</li>
</ul>

<h3>1.3 Ce aduce in plus Cotewad</h3>
<p>
	Trebuie mentionat ca pe langa baza de date relationala MySql, Cotewad mai foloseste o baza de date numita CouchDb ce face parte din familia bazelor de date NoSql si care permite stocarea datelor sub forma de documente JSON, utilizarea sa fiind din ce in ce mai frecventa datorita nivelului de vulnerabilitate scazut.
	De asemenea toate fisierele editate de dumneavoastra nu se pierd ci sunt stocate cu ajutorul Google Drive-ului, iar cu ajutorul unui istoric al fisierelor editate anterior aveti posibilatea reeditarii.
</p>

<h2>Tehnologii folosite</h2>

<h3>1.1 Programe folosite</h3>
<p>
	In dezvoltarea acestei aplicatii web s-au folosit urmatoarele programe: Aptana Studio 3, SQLyog, WAMP, EasyPHP.
</p>

<h4>1.1.1 Aptana Studio 3<h4/>
<p>
	Aptana Studio 3 este un program profesionist, open source pentru dezvoltarea aplicatiilor web. Acest program are suport pentru limbajele HTML5, CSS3, JavaScript, Ruby, Rails, PHP si Python.
	Pentru mai multe detalii , dati click [aici](http://www.aptana.com/products/studio3).
</p><h4>1.1.2 SQLyog</h4>
<p>
	SQLyog este un program pentru managementul bazelor de date. In dezvoltarea aplicatii actuale s-a folosit o versiune trial.
	Pentru mai multe detalii despre program, urmariti [acest link](https://www.webyog.com/product/sqlyog).
</p><h4>1.1.3</h4>
<p>
	WampServer este un mediu de dezvoltare a aplicatiilor web. Pune la dispozitie serverul Apache2, PHP si o baza de date MySQL. Ofera de asemenea o aplicatie de gestiune a bazelor de date: PhpMyAdmin.
	Mai multe detalii [aici](http://www.wampserver.com/en/).
</p><h4>1.1.4 EasyPHP</h4>
<p>
	EasyPHP este un mediu de dezvoltare a aplicatiilor web ce are la baza WAMP.
	(Detalii)[http://www.easyphp.org/].
</p><h3>1.2 Limbaje folosite</h3>
<p>
	Principalele limbaje programatice folosite sunt PHP, JavaScript, HTML5, CSS3.
</p><h4>1.2.1 PHP</h4>
<p>
	PHP este un limbaj foarte cunoscut folosit in dezvoltarea aplicaitilor web pe partea de server. Este un limbaj interpretat (este nevoie de un procesor PHP).
	Mai multe detalii despre versiunile acestui limbaj, sintaxa si implementari, accesati [aceasta pagina](https://en.wikipedia.org/wiki/PHP).
</p><h4>1.2.2 JavaScript</h4>
<p>
	JavaScript este un limbaj de programare interpretat si implementat original ca parte a browserelor web pentru a oferi suport asincron pentru scripturile client.
	Accesati [aceast link](https://en.wikipedia.org/wiki/JavaScript) pentru mai multe detalii.
</p><h4>1.2.3 HTML5</h4>
<p>
	HTML5 este limbajul actualizat de marcare folosit pentru structurarea documentelor utilizate in web.
	[Detalii](https://en.wikipedia.org/wiki/HTML5)
</p><h4>1.2.4 CSS3</h4>
<p>
	CSS3 este un limbaj folosit in descrierea prezentarii unui fisier (construit prin limbaj de marcare).
	Detalii despre versiunile precedente, cea actuala si cea in curs de dezvoltare le puteti gasi accesand [aceasta pagina](https://en.wikipedia.org/wiki/CSS3#CSS_3).
</p><h3>1.3 Alte unelte folosite</h3>
<p>
	Pentru eficientizarea lucrului in echipa si structurarea aplicatiei am folosit un aplicatie web de gazduire numit GitHub si framework-ul Codeigniter, pentru PHP.
</p><h4>1.3.1 GitHub</h4>
<p>
	GitHub este un serviciu web pentru gazduirea proiectelor gratuit sau platit, diferentiere facandu-se pe baza dreptului de acces la proiectele gazduite (publice sau private). Aplicatia dispunde si de un client local pentru Windows, de asemenea folosit.
	GitHub este folosit de aplicatia noastra si pentru gazduirea documentatiei.
	Detalii [aici](https://en.wikipedia.org/wiki/GitHub).
</p><h4>1.3.2 Codigniter</h4>
<p>
	Codeigniter este un framework open source pentru dezvoltarea aplicatiilor web dinamice, in limbajul PHP. Ofera o multime de librarii care faciliteaza dezvoltarea si structurarea aplicatiilor.
	[Pagina wiki](https://en.wikipedia.org/wiki/Codeigniter) aferenta.
</p> Arhitectura aplicației <h2>Detalii de implementare</h2><h3>1 Concepte utilizate</h3> 
<ul>
	<li>
		AJAX
	</li>
	<li>
		Real-Time
	</li>
	<li>
		Colaborative editing
	</li>
</ul>
<h2>Concluzii</h2><h2>Bibliografie</h2>
<ul>
	<li>
		<a href="http://profs.info.uaic.ro/~busaco/teach/courses/web/web-film.html">http://profs.info.uaic.ro/~busaco/teach/courses/web/web-film.html</a>
	</li>
	<li>
		<a href="http://profs.info.uaic.ro/~busaco/teach/courses/cliw/web-film.html">http://profs.info.uaic.ro/~busaco/teach/courses/cliw/web-film.html</a>
	</li>
	<li>
		<a href="http://api.jquery.com/](http://api.jquery.com/">http://api.jquery.com/](http://api.jquery.com/</a>
	</li>
	<li>
		<a href="https://developers.google.com/drive/realtime/">https://developers.google.com/drive/realtime/"</a>
	</li>
	<li>
		<a href="http://devzone.zend.com/1782/getting-started-with-couchdb_meet-php-on-couch/">http://devzone.zend.com/1782/getting-started-with-couchdb_meet-php-on-couch/</a>
	</li>
</ul>