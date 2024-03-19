@props(['name', 'label', 'description', 'value', 'required'])

<label for="{{ $name }}">{{ $label }} {!! ($required ?? false) ? '<span class="required">*</span>' : '' !!}</label>

<div class="form-group">

    <div class=" {{ $errors->has($name) ? 'error' : '' }}">
        <select id="{{ $name }}" 
                class="form-control select-provincia" 
                name="{{ $name }}" 
                {{ ($required ?? false) ? 'required' : '' }} >
            
            <option value="" >&mdash;</option>         
            @php /*<optgroup label="Estero">
                <option value="Estero">Estero</option>
            </optgroup> */ @endphp

            <optgroup label="Italia">
                <option value="AG" @selected($value == "AG")>Agrigento</option>
                <option value="AL" @selected($value == "AL")>Alessandria</option>
                <option value="AN" @selected($value == "AN")>Ancona</option>
                <option value="AO" @selected($value == "AO")>Aosta</option>
                <option value="AR" @selected($value == "AR")>Arezzo</option>
                <option value="AP" @selected($value == "AP")>Ascoli Piceno</option>
                <option value="AT" @selected($value == "AT")>Asti</option>
                <option value="AV" @selected($value == "AV")>Avellino</option>
                <option value="BA" @selected($value == "BA")>Bari</option>
                <option value="BT" @selected($value == "BT")>Barletta-Andria-Trani</option>
                <option value="BL" @selected($value == "BL")>Belluno</option>
                <option value="BN" @selected($value == "BN")>Benevento</option>
                <option value="BG" @selected($value == "BG")>Bergamo</option>
                <option value="BI" @selected($value == "BI")>Biella</option>
                <option value="BO" @selected($value == "BO")>Bologna</option>
                <option value="BZ" @selected($value == "BZ")>Bolzano</option>
                <option value="BS" @selected($value == "BS")>Brescia</option>
                <option value="BR" @selected($value == "BR")>Brindisi</option>
                <option value="CA" @selected($value == "CA")>Cagliari</option>
                <option value="CL" @selected($value == "CL")>Caltanissetta</option>
                <option value="CB" @selected($value == "CB")>Campobasso</option>
                <option value="CI" @selected($value == "CI")>Carbonia-Iglesias</option>
                <option value="CE" @selected($value == "CE")>Caserta</option>
                <option value="CT" @selected($value == "CT")>Catania</option>
                <option value="CZ" @selected($value == "CZ")>Catanzaro</option>
                <option value="CH" @selected($value == "CH")>Chieti</option>
                <option value="CO" @selected($value == "CO")>Como</option>
                <option value="CS" @selected($value == "CS")>Cosenza</option>
                <option value="CR" @selected($value == "CR")>Cremona</option>
                <option value="KR" @selected($value == "KR")>Crotone</option>
                <option value="CN" @selected($value == "CN")>Cuneo</option>
                <option value="EN" @selected($value == "EN")>Enna</option>
                <option value="FM" @selected($value == "FM")>Fermo</option>
                <option value="FE" @selected($value == "FE")>Ferrara</option>
                <option value="FI" @selected($value == "FI")>Firenze</option>
                <option value="FG" @selected($value == "FG")>Foggia</option>
                <option value="FC" @selected($value == "FC")>Forlì-Cesena</option>
                <option value="FR" @selected($value == "FR")>Frosinone</option>
                <option value="GE" @selected($value == "GE")>Genova</option>
                <option value="GO" @selected($value == "GO")>Gorizia</option>
                <option value="GR" @selected($value == "GR")>Grosseto</option>
                <option value="IM" @selected($value == "IM")>Imperia</option>
                <option value="IS" @selected($value == "IS")>Isernia</option>
                <option value="SP" @selected($value == "SP")>La Spezia</option>
                <option value="AQ" @selected($value == "AQ")>L'Aquila</option>
                <option value="LT" @selected($value == "LT")>Latina</option>
                <option value="LE" @selected($value == "LE")>Lecce</option>
                <option value="LC" @selected($value == "LC")>Lecco</option>
                <option value="LI" @selected($value == "LI")>Livorno</option>
                <option value="LO" @selected($value == "LO")>Lodi</option>
                <option value="LU" @selected($value == "LU")>Lucca</option>
                <option value="MC" @selected($value == "MC")>Macerata</option>
                <option value="MN" @selected($value == "MN")>Mantova</option>
                <option value="MS" @selected($value == "MS")>Massa-Carrara</option>
                <option value="MT" @selected($value == "MT")>Matera</option>
                <option value="VS" @selected($value == "VS")>Medio Campidano</option>
                <option value="ME" @selected($value == "ME")>Messina</option>
                <option value="MI" @selected($value == "MI")>Milano</option>
                <option value="MO" @selected($value == "MO")>Modena</option>
                <option value="MB" @selected($value == "MB")>Monza e della Brianza</option>
                <option value="NA" @selected($value == "NA")>Napoli</option>
                <option value="NO" @selected($value == "NO")>Novara</option>
                <option value="NU" @selected($value == "NU")>Nuoro</option>
                <option value="OG" @selected($value == "OG")>Ogliastra</option>
                <option value="OT" @selected($value == "OT")>Olbia-Tempio</option>
                <option value="OR" @selected($value == "OR")>Oristano</option>
                <option value="PD" @selected($value == "PD")>Padova</option>
                <option value="PA" @selected($value == "PA")>Palermo</option>
                <option value="PR" @selected($value == "PR")>Parma</option>
                <option value="PV" @selected($value == "PV")>Pavia</option>
                <option value="PG" @selected($value == "PG")>Perugia</option>
                <option value="PU" @selected($value == "PU")>Pesaro e Urbino</option>
                <option value="PE" @selected($value == "PE")>Pescara</option>
                <option value="PC" @selected($value == "PC")>Piacenza</option>
                <option value="PI" @selected($value == "PI")>Pisa</option>
                <option value="PT" @selected($value == "PT")>Pistoia</option>
                <option value="PN" @selected($value == "PN")>Pordenone</option>
                <option value="PZ" @selected($value == "PZ")>Potenza</option>
                <option value="PO" @selected($value == "PO")>Prato</option>
                <option value="RG" @selected($value == "RG")>Ragusa</option>
                <option value="RA" @selected($value == "RA")>Ravenna</option>
                <option value="RC" @selected($value == "RC")>Reggio Calabria</option>
                <option value="RE" @selected($value == "RE")>Reggio Emilia</option>
                <option value="RI" @selected($value == "RI")>Rieti</option>
                <option value="RN" @selected($value == "RN")>Rimini</option>
                <option value="RM" @selected($value == "RM")>Roma</option>
                <option value="RO" @selected($value == "RO")>Rovigo</option>
                <option value="SA" @selected($value == "SA")>Salerno</option>
                <option value="SS" @selected($value == "SS")>Sassari</option>
                <option value="SV" @selected($value == "SV")>Savona</option>
                <option value="SI" @selected($value == "SI")>Siena</option>
                <option value="SR" @selected($value == "SR")>Siracusa</option>
                <option value="SO" @selected($value == "SO")>Sondrio</option>
                <option value="TA" @selected($value == "TA")>Taranto</option>
                <option value="TE" @selected($value == "TE")>Teramo</option>
                <option value="TR" @selected($value == "TR")>Terni</option>
                <option value="TO" @selected($value == "TO")>Torino</option>
                <option value="TP" @selected($value == "TP")>Trapani</option>
                <option value="TN" @selected($value == "TN")>Trento</option>
                <option value="TV" @selected($value == "TV")>Treviso</option>
                <option value="TS" @selected($value == "TS")>Trieste</option>
                <option value="UD" @selected($value == "UD")>Udine</option>
                <option value="VA" @selected($value == "VA")>Varese</option>
                <option value="VE" @selected($value == "VE")>Venezia</option>
                <option value="VB" @selected($value == "VB")>Verbano-Cusio-Ossola</option>
                <option value="VC" @selected($value == "VC")>Vercelli</option>
                <option value="VR" @selected($value == "VR")>Verona</option>
                <option value="VV" @selected($value == "VV")>Vibo Valentia</option>
                <option value="VI" @selected($value == "VI")>Vicenza</option>
                <option value="VT" @selected($value == "VT")>Viterbo</option>
            </optgroup>
        </select>        
    </div>

    @if ($errors->has($name))
        <label class="error">{{ $errors->first($name) }}</label>
    @endif                                                    
    <div class="help-info">{{ $description }}</div>
</div>
