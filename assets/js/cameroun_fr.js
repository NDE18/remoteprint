    var region = ['Adamaoua', 'Centre', 'Est', 'Extrême-Nord', 'Littoral', 'Nord', 'Nord-Ouest', 'Ouest', 'Sud', 'Sud-Ouest',],
        departement = {
            Adamaoua: ['Djérem', 'Faro-et-Déo', 'Mayo-Banyo', 'Mbéré', 'Vina'],
            Centre: ['Haute-Sanaga', 'Lekié', 'Mbam-et-Inoubou', 'Mbam-et-Kim', 'Méfou-et-Afamba', 'Méfou-et-Akono', 'Mfoundi', 'Nyong-et-Kellé', 'Nyong-et-Mfoumou', 'Nyong-et-So’o'],
            Est: ['Boumba-et-Ngoko', 'Haut-Nyong', 'Kadey', 'Lom-et-Djérem'],
            Extrême_Nord: ['Diamaré', 'Logone-et-Chari', 'Mayo-Danay', 'Mayo-Kani', 'Mayo-Sava', 'Mayo-Tsanaga'],
            Littoral: ['Moungo', 'Nkam', 'Sanaga-Maritime', 'Wouri'],
            Nord: ['Bénoué', 'Faro', 'Mayo-Louti', 'Mayo-Rey'],
            Nord_Ouest: ['Boyo', 'Bui', 'Donga-Mantung', 'Menchum', 'Mezam', 'Momo', 'Ngo-Ketunjia'],
            Ouest: ['Bamboutos', 'Haut-Nkam', 'Hauts-Plateaux', 'Koung-Khi', 'Menoua', 'Mifi', 'Ndé', 'Noun'],
            Sud: ['Dja-et-Lobo', 'Mvila', 'Océan', 'Vallée-du-Ntem'],
            Sud_Ouest: ['Fako', 'Koupé-Manengouba', 'Lebialem', 'Manyu', 'Meme', 'Ndian']
        },
        arrondissement = {
            Djérem: ['Ngoundal', 'Tibati'],
            Faro_et_Déo: ['None'],
            Mayo_Banyo: ['Banyo(Mayo-Darle)'],
            Mbéré: ['Meiganga', 'Djonhong', 'Dir'],
            Vina: ['Ngaoundéré 1er', 'Ngaoundéré 2e', 'Ngaoundéré 3e', 'Belel', 'Mbe', 'Nganha', 'Nyambaka', 'Martap'],
            Haute_Sanaga: ['Mbandjock(Bibbey)', 'Minta(Nsem)', 'Nanga-Eboko(Lembe-Yezoum)', 'Nkoteng'],
            Lekié: ['EVODOULA','MONATELE OBALA','(BATSCHENGA)','OKOLA(LOBO)','SA\'A','ELIG-MFOMO','EBEBDA' ],
            Mbam_et_Inoubou: ['BAFIA','BOKITO','DEUK','MAKENENE','NDIKINIMEKI(NITOUKOU)','OMBESSA','KIIKI','KON-YAMBETTA'],
            Mbam_et_Kim: ['NTUI ','NGAMBE ','NGORO','YOKO ','MBANGASSINA'],
            Méfou_et_Afamba: ['MFOU ','ESSE ','AWAE ','SOA'],
            Méfou_et_Akono: ['NGOUMOU','AKONO','MBANKOMO','BIKOK'],
            Mfoundi: ['YAOUNDE I','YAOUNDE II','YAOUNDE III','YAOUNDE IV','YAOUNDE V','YAOUNDE VI','YAOUNDE VII'],
            Nyong_et_Kellé: ['BOT-MAKAK (NGUIBASSAL)','ESEKA','MAKAK (BONDJOCK)','MESSONDO (BIYOUHA)','NGOG-MAPUBI','MATOMB','DIBANG'],
            Nyong_et_Mfoumou: ['AKONOLINGA (MENGANG)','AYOS (NYAKOKOMBO)','ENDOM'],
            Nyong_et_Soo: ['DZENG','MBALMAYO','NGOMEDZAP'],
            Boumba_et_Ngoko: ['MOLOUNDOU(SALAPOUMBE)','SALAPOUMBE','GARI-GOMBO'],
            Haut_Nyong: ['ABONG-MBANG (BEBEND, MBOUANZ, DJA)','DOUME','(DOUMAINTANG)','LOMIE (MESSOK)','MESSAMENA (SAMALOMO)','NGUELEMENDOUKA (BOMA)','DIMAKO','NGOYLA'],
            Kadey: ['BATOURI(NDEM-NAM)','NDELELE (BOMBE)','KETTE (MBOTORO)','MBANG'],
            Lom_et_Djérem: ['BERTOUA 1er','BERTOUA2e','BETARE-OYA (NGOURA)','BELABO','GAROUA-BOULAÏ','DIANG','MANDJOU'],
            Diamaré: ['BOGO','MAROUA 1er (DARGALA, DOUKOULA)',' MAROUA 2e',' MAROUA 3e',' MERI',' GAZAWA',' PETTE'],
            Logone_et_Chari: ['KOUSSERI',' MAKARY',' LOGONE-BIRNI (ZINA)',' GOULFEY',' WAZA',' FOTOKOL',' HILE-HALIFA',' BLANGOUA',' DARAK'],
            Mayo_Danay: ['KAR-HAY',' DATCHEKA',' YAGOUA',' GUERE',' MAGA',' KALFOU',' WINA',' VELE',' TCHATIBALI',' GOBO','KAÏ-KAÏ'],
            Mayo_Kani: ['KAELE',' GUIDIGUIS',' MINDIF',' MOUTOURWA',' MOULVOUDAYE',' PORHI',' TAIBONG'],
            Mayo_Sava: ['MORA',' TOKOMBERE',' KOLOFATA'],
            Mayo_Tsanaga: ['MOKOLO (SOULEDE-ROUA)',' BOURRHA',' KOZA',' HINA',' MOGODE',' MAYO-MASKOTA'],
            Moungo: ['DIBOMBARI (ABO)','LOUM','MANJO','MBANGA (MOMBO)','MELONG','NKONGSAMBA 1er','NKONGSAMBA 2e','NKONGSAMBA 3e','NLONAKO','BARE-BAKEM','NJOMBE-PENJA'],
            Nkam: ['NKONDJOCK (NORD-MAKOMBE)','YABASSI','YINDI'],
            Sanaga_Maritime: ['DIZANGE','EDEA 1er','EDEA 2e','NDOM (NYANON)','NGAMBE (MASSOCK-SONGLOULOU)','POUMA','MOUANKO','DIBAMBA','NGWEI'],
            Wouri: ['DOUALA 1er','DOUALA 2e','DOUALA 3e','DOUALA 4e','DOUALA 5e','DOUALA 6e','MANOKA'],
            Bénoué: ['GAROUA 1er (BASHEO,DEMBO,TOUROUA)','GAROUA 2e','GAROUA 3e','BIBEMI','PITOA','LAGDO','DEMBO','TCHEBOA','MAYO HOURNA'],
            Faro: ['POLI','BEKA'],
            Mayo_Louti: ['GUIDER','PAYO-OULO','FIGUIL'],
            Mayo_Rey: ['REY-BOUBA','TCHOLLIRE (MADINGRING)','TOUBORO'],
            Bui : ['JAKIRI','KUMBO','OKU','MBVEN','NONI','NKUM'],
            Boyo: ['FUNDONG','BELO','BUM','NJINIKOM'],
            Donga_Mantung: ['NKAMBE','NWA','AKO','MISAJE','NDU'],
            Menchum: ['WUM','FURU-AWA','MENCHUM VALLEY','FUNGOM'],
            Mezam: ['BAMENDA 1er','BAMENDA 2e','BAMENDA 3e','BALI','TUBAH','BAFUT','SANTA'],
            Momo: ['BATIBO','MBENGWI','NJIKWA','NGIE','WIDIKUM-MENKA'],
            Ngo_Ketunjia: ['NDOP','BABESSI','BALIKUMBAT'],
            Bamboutos: ['MBOUDA','GALIM','BATCHAM','BABADJOU'],
            Haut_Nkam: ['BAFANG','BANA','BANDJA','KEKEM (BANWA)','BAKOU','BANKA'],
            Hauts_Plateaux: ['BAHAM','BAMENDJOU','BANGOU'],
            Koung_Khi: ['POUMOUGNE','BAYANGAM  (DJEBEM)'],
            Menoua: ['DSCHANG','PENKA-MICHEl','FOKOUE','NKONG-NI','SANTCHOU','FONGO TONGO'],
            Mifi: ['BAFOUSSAM 1er','BAFOUSSAM 2e','BAFOUSSAM 3e'],
            Ndé: ['BANGANGTE (BASSAMBA)','BAZOU','TONGA'],
            Noun: ['FOUMBAN','FOUMBOT','MALENTOUEN','MASSANGAM','MAGBA','KOUTABA','BANGOURAIN','KOUOPTAMO','NJIMON'],
            Dja_et_Lobo: ['BENGBIS','DJOUM','SANGMELIMA','ZOETELE','OVENG','MINTOM','MEYOMESSALA','MEYOMESSI'],
            Mvila: ['EBOLOWA 1er','EBOLOWA 2e','BIWONG-BANE','MVANGAN','MENGONG','NGOULEMAKONG','EFOULAN','BIWONG BULU'],
            Océan: ['AKOM II','CAMPO (NIETE)','KRIBI 1er','KRIBI 2e','LOLODORF','MVENGUE','BIPINDI','LOKOUNDJE'],
            Vallée_du_Ntem: ['MUYUKA','TIKO','LIMBE 1er (WEST-COAST)','LIMBE 2e','LIMBE 3e','BUEA'],
            Fako: ['BANGEM','NGUTI','TOMBEL'],
            Koupé_Manengouba: ['BANGEM','NGUTI','TOMBEL'],
            Lebialem: ['FONTEM','ALOU','WABANE'],
            Manyu: ['AKWAYA','MAMFE','EYUMODJOCK','UPPER-BAYANG'],
            Meme: ['KUMBA 1er','KUMBA 2e','KUMBA 3e','KONYE','BONGE'],
            Ndian: ['BAMUSSO','EKONDO-TITI (DIKOME-BALUE, TOKO)','ISANGUELE','MUNDEMBA','KOMBO ABEDIMO','KOMBO IDINTI','IDABATO'],
        };

    var ville = ['Douala','Yaoundé','Garoua','Bamenda','Maroua','Nkongsamba','Bafoussam','Ngaoundéré','Bertoua','Loum','Kumba','Edéa','Kumbo','Foumban','Mbouda','Dschang','Limbé','Ebolowa',
        'Kousséri','Guider','Meiganga','Yagoua','Mbalmayo','Bafang','Tiko','Bafia','Wum','Kribi','Buea','Sangmélima','Foumbot','Bangangté','Batouri','Banyo','Nkambé','Bali','Mbanga','Mokolo',
        'Melong','Manjo','Garoua-Boulaï','Mora','Kaélé','Tibati','Ndop','Akonolinga','Eséka','Mamfé','Obala','Muyuka','Nanga-Eboko','Abong-Mbang','Fundong','Nkoteng','Fontem','Mbandjock','Touboro',
        'Ngaoundal','Yokadouma','Pitoa','Tombel','Kékem','Magba','Bélabo','Tonga','Maga','Koutaba','Blangoua','Guidiguis','Bogo','Batibo','Yabassi','Figuil','Makénéné','Gazawa','Tcholliré'];

    function putVille(selector) {
        var i, text = $(selector).find('option').eq(0).html();
        for (i = 0; i < ville.length; i++) {
            text += "<option value='" + ville[i] + "'>" + ville[i] + "</option>";
        }
        $(selector).html(text);
    }

    function putRegion(selector) {
        var i, text = "";
        for (i = 0; i < region.length; i++) {
            text += "<option value='" + region[i] + "'>" + region[i] + "</option>";
        }
        $(selector).html(text);
    }

    function putDepartement(selector, region) {
        var i, text = "";
        region = region.replace(/-/g, '_').replace(/'/g, '');
        for (i = 0; i < departement[region].length; i++) {
            text += "<option value='" + departement[region][i] + "'>" + departement[region][i] + "</option>";
        }
        $(selector).html(text);
    }

    function putArrondissement(selector, departement) {
        var i, text = "";
        departement = departement.replace(/-/g, '_').replace(/'/g, '');
        for (i = 0; i < arrondissement[departement].length; i++) {
            text += "<option value='" + arrondissement[departement][i] + "'>" + arrondissement[departement][i] + "</option>";
        }
        $(selector).html(text);
    }