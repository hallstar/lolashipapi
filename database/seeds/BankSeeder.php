<?php

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $branches = [
            [
                "BankName" => "CITIBANK",
                "BranchName" => "KINGSTON ",
                "BranchNumber" => "00001",
                "ABANumber" => "401050028",
                "BIC" => "CITIJMK1"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "BLACK RIVER ",
                "BranchNumber" => "40105 ",
                "ABANumber" => "201150021    ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "BROWNS TOWN ",
                "BranchNumber" => "20115 ",
                "ABANumber" => "365250029   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "CHRISTIANA ",
                "BranchNumber" => "00125 ",
                "ABANumber" => "001250024 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "CONSTANT SPRING FIN CTRE.",
                "BranchNumber" => "21725",
                "ABANumber" => "217250025",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "CROSS ROADS ",
                "BranchNumber" => "80135 ",
                "ABANumber" => "801350027 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "FAIRVIEW",
                "BranchNumber" => "90605 ",
                "ABANumber" => "906050028   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "FALMOUTH ",
                "BranchNumber" => "01305 ",
                "ABANumber" => "013050021 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "HAGLEY PARK ",
                "BranchNumber" => "90175 ",
                "ABANumber" => "901750022 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "HALF WAY TREE ",
                "BranchNumber" => "60145 ",
                "ABANumber" => "601450020  ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "IRONSHORE ",
                "BranchNumber" => "38745 ",
                "ABANumber" => "387450027    ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "JUNCTION ",
                "BranchNumber" => "22475 ",
                "ABANumber" => "224750026   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "KING STREET ",
                "BranchNumber" => "30015 ",
                "ABANumber" => "300150029  ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "LIGUANEA ",
                "BranchNumber" => "90365 ",
                "ABANumber" => "903650023 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "LINSTEAD ",
                "BranchNumber" => "70185 ",
                "ABANumber" => "701850025 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "MANDEVILLE ",
                "BranchNumber" => "50195 ",
                "ABANumber" => "501950028   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "MAY PEN ",
                "BranchNumber" => "30205 ",
                "ABANumber" => "302050020 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "MONTEGO BAY ",
                "BranchNumber" => "10215 ",
                "ABANumber" => "102150023  ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "MORANT BAY ",
                "BranchNumber" => "61655 ",
                "ABANumber" => "616550025 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "NEGRIL",
                "BranchNumber" => "92825 ",
                "ABANumber" => "928250026 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "NEW KINGSTON ",
                "BranchNumber" => "50575 ",
                "ABANumber" => "505750020 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "OCHO RIOS ",
                "BranchNumber" => "90225 ",
                "ABANumber" => "902250026 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "OLD HARBOUR ",
                "BranchNumber" => "41335 ",
                "ABANumber" => "413350020    ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "OXFORD ROAD ",
                "BranchNumber" => "81505 ",
                "ABANumber" => "815050025    ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "PORT ANTONIO ",
                "BranchNumber" => "70235 ",
                "ABANumber" => "702350029 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "PORT MARIA ",
                "BranchNumber" => "50245 ",
                "ABANumber" => "502450022  ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "PORTMORE",
                "BranchNumber" => "95505",
                "ABANumber" => "955050024",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "PREMIER ",
                "BranchNumber" => "61325 ",
                "ABANumber" => "613250027   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "PRIVATE BANKING",
                "BranchNumber" => "09225 ",
                "ABANumber" => "092250020   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "SANTA CRUZ ",
                "BranchNumber" => "81315 ",
                "ABANumber" => "813150024    ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "SAVANNA LA MAR ",
                "BranchNumber" => "00265 ",
                "ABANumber" => "002650021   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "SCOTIA JAMAICA BUILDING SOCIETY ",
                "BranchNumber" => "36525 ",
                "ABANumber" => "507650021 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "SCOTIABANK CENTRE ",
                "BranchNumber" => "50765",
                "ABANumber" => "802750024   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "SPANISH TOWN ",
                "BranchNumber" => "80275 ",
                "ABANumber" => "202550028 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "ST ANNS BAY ",
                "BranchNumber" => "20255 ",
                "ABANumber" => "184650020 ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "BANK OF NOVA SCOTIA",
                "BranchName" => "UWI ",
                "BranchNumber" => "18465 ",
                "ABANumber" => "000010265   ",
                "BIC" => "NOSCJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "CROSS ROADS ",
                "BranchNumber" => "99095",
                "ABANumber" => "090760101",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "DUKE & HARBOUR - DOWNTOWN",
                "BranchNumber" => "99089",
                "ABANumber" => "091560106",
                "BIC" => "FILBJMKN",
                "undefined" => "  "
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "HOPEWELL",
                "BranchNumber" => "99099",
                "ABANumber" => "095160104 ",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "LIGUANEA  ",
                "BranchNumber" => "99085 ",
                "ABANumber" => "095260101",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "LINSTEAD ",
                "BranchNumber" => "99098",
                "ABANumber" => "095360108",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "MANDEVILLE",
                "BranchNumber" => "99084 ",
                "ABANumber" => "095460105",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "MANOR PARK ",
                "BranchNumber" => "99082   ",
                "ABANumber" => "095960100  ",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "MAY PEN",
                "BranchNumber" => "99100",
                "ABANumber" => "096560101 ",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "MONTEGO BAY ",
                "BranchNumber" => "99080",
                "ABANumber" => "096760105",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "NEW KINGSTON  ",
                "BranchNumber" => "99075",
                "ABANumber" => "096770108 ",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "OCHO RIOS",
                "BranchNumber" => "99094",
                "ABANumber" => "097460103   ",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "PORTMORE",
                "BranchNumber" => "99097",
                "ABANumber" => "097480109",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRST GLOBAL BANK",
                "BranchName" => "SANTA CRUZ ",
                "BranchNumber" => "99096",
                "ABANumber" => "275020103  ",
                "BIC" => "FILBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "HALF WAY TREE ",
                "BranchNumber" => "09536 ",
                "ABANumber" => "097470106  ",
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "KING STREET ",
                "BranchNumber" => "09156",
                "ABANumber" => "990750758  ",
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "KINGSTON - SBU",
                "BranchNumber" => "27502 ",
                "ABANumber" => "990800750   ",
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "LIGUANEA   ",
                "BranchNumber" => "09748 ",
                "ABANumber" => "990820756",
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "MANDEVILLE",
                "BranchNumber" => "09746 ",
                "ABANumber" => "990840752   ",
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "MANOR PARK ",
                "BranchNumber" => "09076",
                "ABANumber" => "990850755 ",
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "MAY PEN ",
                "BranchNumber" => "09596 ",
                "ABANumber" => "990890757",
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "MONTEGO BAY  - FAIRVIEW ",
                "BranchNumber" => "09546  ",
                "ABANumber" => null,
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "NEW KINGSTON  ",
                "BranchNumber" => "09676  ",
                "ABANumber" => null,
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "OCHO RIOS  ",
                "BranchNumber" => "09526  ",
                "ABANumber" => null,
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "PORT ANTONIO ",
                "BranchNumber" => "09516  ",
                "ABANumber" => null,
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "PORTMORE ",
                "BranchNumber" => "09747",
                "ABANumber" => null,
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "SAV-LA-MAR  ",
                "BranchNumber" => "09677 ",
                "ABANumber" => null,
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "FIRSTCARIBBEAN INTERNATIONAL BANK",
                "BranchName" => "TWIN GATES  ",
                "BranchNumber" => "09656 ",
                "ABANumber" => null,
                "BIC" => "FCIBJMKN"
            ],
            [
                "BankName" => "JMMB BANK",
                "BranchName" => "HAUGHTON TERRACE",
                "BranchNumber" => "00006",
                "ABANumber" => "000060778",
                "BIC" => "JMJAJMKN"
            ],
            [
                "BankName" => "JMMB BANK",
                "BranchName" => "HEAD OFFICE ",
                "BranchNumber" => "00008",
                "ABANumber" => "000080774    ",
                "BIC" => "JMJAJMKN"
            ],
            [
                "BankName" => "JMMB BANK",
                "BranchName" => "KINGSTON ",
                "BranchNumber" => "00006",
                "ABANumber" => "000060778     ",
                "BIC" => "JMJAJMKN"
            ],
            [
                "BankName" => "JMMB BANK",
                "BranchName" => "MANDEVILLE",
                "BranchNumber" => "00013",
                "ABANumber" => "000130776    ",
                "BIC" => "JMJAJMKN"
            ],
            [
                "BankName" => "JMMB BANK",
                "BranchName" => "MONTEGO BAY",
                "BranchNumber" => "00016",
                "ABANumber" => "000160775     ",
                "BIC" => "JMJAJMKN"
            ],
            [
                "BankName" => "JMMB BANK",
                "BranchName" => "OCHO RIOS",
                "BranchNumber" => "00017",
                "ABANumber" => "000170778    ",
                "BIC" => "JMJAJMKN"
            ],
            [
                "BankName" => "JMMB BANK",
                "BranchName" => "PORTMORE",
                "BranchNumber" => "00018",
                "ABANumber" => "000180771     ",
                "BIC" => "JMJAJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " ANNOTTO BAY ",
                "BranchNumber" => "00020",
                "ABANumber" => "000200774  ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " BARBICAN ",
                "BranchNumber" => "00021",
                "ABANumber" => "000210777     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " BROWN’S TOWN ",
                "BranchNumber" => "00023",
                "ABANumber" => "000230773    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " CATHERINE HALL",
                "BranchNumber" => "00024",
                "ABANumber" => "000240776     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " CENTRALISED OPERATIONS",
                "BranchNumber" => "00025",
                "ABANumber" => "000250779 ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " CHRISTIANA ",
                "BranchNumber" => "00029",
                "ABANumber" => "000290771    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " DUKE STREET",
                "BranchNumber" => "00030",
                "ABANumber" => "000300771     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " FALMOUTH ",
                "BranchNumber" => "00032",
                "ABANumber" => "000320777     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " GAYLE ",
                "BranchNumber" => "00033",
                "ABANumber" => "000330770",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " HALF-WAY-TREE  ",
                "BranchNumber" => "00035",
                "ABANumber" => "000350776     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " HEAD OFFICE",
                "BranchNumber" => "00036",
                "ABANumber" => "000360779  ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " HIGHGATE ",
                "BranchNumber" => "00037",
                "ABANumber" => "000370772  ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " HWT TRANSPORT CENTRE ",
                "BranchNumber" => "00039",
                "ABANumber" => "000390778    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " INTERNAL PROCESSING CENTRE ",
                "BranchNumber" => "00040",
                "ABANumber" => "000400778     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " JUNCTION ",
                "BranchNumber" => "00043",
                "ABANumber" => "000430777   ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " KNUTSFORD BLVD",
                "BranchNumber" => "00044",
                "ABANumber" => "000440770    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " LINSTEAD ",
                "BranchNumber" => "00047",
                "ABANumber" => "000470779     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " LUCEA ",
                "BranchNumber" => "00049",
                "ABANumber" => "000490775     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " MANDEVILLE",
                "BranchNumber" => "00050",
                "ABANumber" => "000500775 ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " MAY PEN",
                "BranchNumber" => "00054",
                "ABANumber" => "000540777     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " MONTEGO BAY ",
                "BranchNumber" => "00055",
                "ABANumber" => "000550770   ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " MORANT BAY ",
                "BranchNumber" => "00056",
                "ABANumber" => "000560773     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " NEW KINGSTON   ",
                "BranchNumber" => "00057",
                "ABANumber" => "000570776     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " OCHO RIOS",
                "BranchNumber" => "00058",
                "ABANumber" => "000580779    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " OLD HARBOUR ",
                "BranchNumber" => "00060",
                "ABANumber" => "000600772 ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " PAPINE ",
                "BranchNumber" => "00061",
                "ABANumber" => "000610775   ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " PORT ANTONIO",
                "BranchNumber" => "00063",
                "ABANumber" => "000630771     ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " PORT MARIA",
                "BranchNumber" => "00064",
                "ABANumber" => "000640774    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " PORTMORE PINES ",
                "BranchNumber" => "00067",
                "ABANumber" => "000670773    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " SANTA CRUZ",
                "BranchNumber" => "00068",
                "ABANumber" => "000680776   ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " SAVANNA-LA-MAR",
                "BranchNumber" => "00071",
                "ABANumber" => "000710772 ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " SOVEREIGN (WASHINGTON BLVD)",
                "BranchNumber" => "00075",
                "ABANumber" => "000750774  ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " SPANISH TOWN ",
                "BranchNumber" => "00078",
                "ABANumber" => "000780773    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " SPANISH TOWN ROAD (TIVOLI)",
                "BranchNumber" => "00081",
                "ABANumber" => "000810779    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " ST ANN’S BAY ",
                "BranchNumber" => "00082",
                "ABANumber" => "000820775",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " UWI ",
                "BranchNumber" => "00084",
                "ABANumber" => "000840778    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "JN BANK",
                "BranchName" => " WHITEHOUSE ",
                "BranchNumber" => "00085",
                "ABANumber" => "000850771    ",
                "BIC" => "JNBSJMKN"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "1 -7 KNUTSFORD BLVD.",
                "BranchNumber" => "00035 ",
                "ABANumber" => "000870777   ",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "30 KNUTSFORD BLVD.",
                "BranchNumber" => "00024 ",
                "ABANumber" => "000880770   ",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "ANNOTTO BAY",
                "BranchNumber" => "00078 ",
                "ABANumber" => "000890773   ",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "BLACK RIVER",
                "BranchNumber" => "00067 ",
                "ABANumber" => "002010771",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "BOULEVARD SUPER CENTRE",
                "BranchNumber" => "00013 ",
                "ABANumber" => "002040770",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "BROWN'S TOWN",
                "BranchNumber" => "00071 ",
                "ABANumber" => "000310774    ",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "CENTRALIZED OPERATIONS",
                "BranchNumber" => "00201 ",
                "ABANumber" => "000233343     ",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "CHAPLETON",
                "BranchNumber" => "00057 ",
                "ABANumber" => "000243346",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "CHRISTIANA",
                "BranchNumber" => "00085 ",
                "ABANumber" => "000263342",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "CONSTANT SPRING ROAD BANK AND FINANCIAL CENTRE",
                "BranchNumber" => "00033",
                "ABANumber" => "010010815",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "CROSS ROADS",
                "BranchNumber" => "00023 ",
                "ABANumber" => "010850813",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "DIRECT BANKING UNIT",
                "BranchNumber" => "00204 ",
                "ABANumber" => "010020818",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "DUKE & BARRY STREET ",
                "BranchNumber" => "00006 ",
                "ABANumber" => "010030811",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "FALMOUTH",
                "BranchNumber" => "00044 ",
                "ABANumber" => "010040814",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "GRANGE HILL AGCY.",
                "BranchNumber" => "00063 ",
                "ABANumber" => "010050817",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "HAGLEY PARK",
                "BranchNumber" => "00017 ",
                "ABANumber" => "010060810",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "HALF MOON",
                "BranchNumber" => "00049 ",
                "ABANumber" => "010080816",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "HALF WAY TREE",
                "BranchNumber" => "00030 ",
                "ABANumber" => "010090819",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "HARBOUR VIEW",
                "BranchNumber" => "00020 ",
                "ABANumber" => "010110812",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "HEAD OFFICE ",
                "BranchNumber" => "0090",
                "ABANumber" => "010120815",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "JUNCTION",
                "BranchNumber" => "00088 ",
                "ABANumber" => "010150814",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "KING STREET ",
                "BranchNumber" => "00006 ",
                "ABANumber" => "010200816",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "LINSTEAD",
                "BranchNumber" => "00068 ",
                "ABANumber" => "010230815",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "LIONEL TWN AGCY.",
                "BranchNumber" => "00055 ",
                "ABANumber" => "010320819",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "LUCEA  ",
                "BranchNumber" => "00075 ",
                "ABANumber" => "010340815",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "MANDEVILLE",
                "BranchNumber" => "00050 ",
                "ABANumber" => null,
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "MATILDA'S CORNER",
                "BranchNumber" => "00037 ",
                "ABANumber" => "010360811",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "MAY PEN",
                "BranchNumber" => "00056 ",
                "ABANumber" => "010370814",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "MORANT BAY",
                "BranchNumber" => "00064 ",
                "ABANumber" => "010500817",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "NEGRIL",
                "BranchNumber" => "00060 ",
                "ABANumber" => "010630813",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "NEWPORT WEST",
                "BranchNumber" => "00039 ",
                "ABANumber" => "010140811     ",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "OCHO RIOS",
                "BranchNumber" => "00058 ",
                "ABANumber" => "007520509",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "OLD HARBOUR",
                "BranchNumber" => "00087 ",
                "ABANumber" => "000570501",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "OXFORD PLACE",
                "BranchNumber" => "00021 ",
                "ABANumber" => "006810508",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "PORT ANTONIO",
                "BranchNumber" => "00084 ",
                "ABANumber" => "009990506",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "PORT MARIA",
                "BranchNumber" => "00081 ",
                "ABANumber" => "002620501",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "PORTMORE",
                "BranchNumber" => "00036 ",
                "ABANumber" => "000530509",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "PRIVATE BANKING",
                "BranchNumber" => "00029 ",
                "ABANumber" => "004500506",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "RED HILLS",
                "BranchNumber" => "00032 ",
                "ABANumber" => "007530502",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "SANTA CRUZ",
                "BranchNumber" => "00089 ",
                "ABANumber" => "000510503",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "SAV LA MAR",
                "BranchNumber" => "00061 ",
                "ABANumber" => "000920504",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "SPAULDINGS AGENCY",
                "BranchNumber" => "00082 ",
                "ABANumber" => "000930507",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "ST. ANN'S BAY",
                "BranchNumber" => "00054 ",
                "ABANumber" => "003320509",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "ST. JAGO SHOPPING CENTRE",
                "BranchNumber" => "00047 ",
                "ABANumber" => "000590507",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "ST. JAMES STREET/BAY WEST",
                "BranchNumber" => "00043 ",
                "ABANumber" => "001220504",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "STAFF TRAINING CENTRE",
                "BranchNumber" => "00018 ",
                "ABANumber" => "004710503",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "TRANSFORMATION UNIT",
                "BranchNumber" => "00008 ",
                "ABANumber" => "002610508",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "UWI",
                "BranchNumber" => "00040 ",
                "ABANumber" => "001910500",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "WINDWARD ROAD AGENCY",
                "BranchNumber" => "00016 ",
                "ABANumber" => "005410501",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "NATIONAL COMMERCIAL BANK",
                "BranchName" => "YALLAHS",
                "BranchNumber" => "00025 ",
                "ABANumber" => "008910503",
                "BIC" => "JNCBJMKX"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "BLACK RIVER",
                "BranchNumber" => "01006",
                "ABANumber" => "000520506",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "BUSINESS BANKING",
                "BranchNumber" => "01085",
                "ABANumber" => "006830504",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "CROSS ROADS",
                "BranchNumber" => "01032",
                "ABANumber" => "000600507",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "DOMINICA DRIVE",
                "BranchNumber" => "01034",
                "ABANumber" => "000550505",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "DUKE & TOWER STREET",
                "BranchNumber" => "01001",
                "ABANumber" => "008210504",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "HALF WAY TREE",
                "BranchNumber" => "01002",
                "ABANumber" => "007510506",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "HEAD OFFICE ",
                "BranchNumber" => "00023",
                "ABANumber" => "001200508",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "HOPE ROAD (LIGUANEA)",
                "BranchNumber" => "00024",
                "ABANumber" => "003310506",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "LIGUANEA",
                "BranchNumber" => "01050",
                "ABANumber" => "004010504",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "LINSTEAD",
                "BranchNumber" => "01005",
                "ABANumber" => "000950503",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "MANDEVILLE",
                "BranchNumber" => "01004",
                "ABANumber" => "001210501",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "MAY PEN",
                "BranchNumber" => "01011",
                "ABANumber" => "000560508",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "MONTEGO BAY",
                "BranchNumber" => "01003",
                "ABANumber" => "006820501",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "NEW KINGSTON",
                "BranchNumber" => "01009",
                "ABANumber" => "000940500",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "OCHO RIOS",
                "BranchNumber" => "01015",
                "ABANumber" => "000580504",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "PORT ANTONIO",
                "BranchNumber" => "01035",
                "ABANumber" => "000020501",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "PORTMORE",
                "BranchNumber" => "01014 ",
                "ABANumber" => "000010508",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "SANTA CRUZ",
                "BranchNumber" => "01036",
                "ABANumber" => "000360504",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "SAV LA MAR",
                "BranchNumber" => "01008",
                "ABANumber" => "000020624",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "SAVANNAH-LA-MAR ",
                "BranchNumber" => "00026",
                "ABANumber" => "000030627",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "SOUTHFIELD",
                "BranchNumber" => "01023",
                "ABANumber" => "000040620",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "SPANISH TOWN",
                "BranchNumber" => "01012",
                "ABANumber" => "000240624",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "STONY HILL",
                "BranchNumber" => "01037",
                "ABANumber" => "000600620",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "TROPICAL PLAZA",
                "BranchNumber" => "01063",
                "ABANumber" => "000610623",
                "BIC" => "SAJAJMKN"
            ],
            [
                "BankName" => "SAGICOR BANK",
                "BranchName" => "UP PARK CAMP",
                "BranchNumber" => "01020",
                "ABANumber" => "000630629",
                "BIC" => "SAJAJMKN"
            ]
        ];

        foreach($branches as $branch)
        {
            $bank = Bank::firstOrCreate(['name' => $branch["BankName"]]);

            $bank->branches()->firstOrCreate([
                'branch_name' => trim($branch["BranchName"]),
                'branch_number' => trim($branch["BranchNumber"]),
                'aba_number' => trim($branch["ABANumber"]),
                'bic' => trim($branch["BIC"]),
            ]);
        }
    }
}
