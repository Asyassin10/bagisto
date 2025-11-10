<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //

        DB::statement("UPDATE `attributes` SET `backup_code` = 'sku' WHERE `attributes`.`id` = 1;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'name' WHERE `attributes`.`id` = 2;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'url_key' WHERE `attributes`.`id` = 3;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'visible_individually' WHERE `attributes`.`id` = 7;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'status' WHERE `attributes`.`id` = 8;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'short_description' WHERE `attributes`.`id` = 9;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'price' WHERE `attributes`.`id` = 11;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cost' WHERE `attributes`.`id` = 12;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'special_price' WHERE `attributes`.`id` = 13;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'special_price_from' WHERE `attributes`.`id` = 14;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'special_price_to' WHERE `attributes`.`id` = 15;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'meta_title' WHERE `attributes`.`id` = 16;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'meta_keywords' WHERE `attributes`.`id` = 17;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'meta_description' WHERE `attributes`.`id` = 18;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'length' WHERE `attributes`.`id` = 19;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'width' WHERE `attributes`.`id` = 20;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'height' WHERE `attributes`.`id` = 21;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'weight' WHERE `attributes`.`id` = 22;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'manage_stock' WHERE `attributes`.`id` = 28;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Ww1mR6dVnog7R6wQ' WHERE `attributes`.`id` = 32;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '07gnLRHqjzAmBc09' WHERE `attributes`.`id` = 37;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'zLzegRMhkzvgMVnY' WHERE `attributes`.`id` = 39;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'n0CNHsAVL3ncWOtD' WHERE `attributes`.`id` = 40;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '9JKOI0HXGrjKKzDB' WHERE `attributes`.`id` = 41;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'JmqHoEua6XS2t8Q4' WHERE `attributes`.`id` = 43;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c11010' WHERE `attributes`.`id` = 46;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c00120' WHERE `attributes`.`id` = 51;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'wnK5qVxAZKOhj9zN' WHERE `attributes`.`id` = 52;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '7pULrJPhocfNS6o9' WHERE `attributes`.`id` = 53;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'IazRJ3xkUkHYTLwK' WHERE `attributes`.`id` = 55;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c1141410' WHERE `attributes`.`id` = 60;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'LVZyIcU2gu7Zwo0Z' WHERE `attributes`.`id` = 62;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rLGC5c9ZEktXyCCz' WHERE `attributes`.`id` = 64;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'gwnK87jynaOImBqG' WHERE `attributes`.`id` = 67;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '0IrLI4pe9GUEkl0b' WHERE `attributes`.`id` = 70;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'vkooV8kwl7M1hjG5' WHERE `attributes`.`id` = 72;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ih8oNdfv44kg2S9h' WHERE `attributes`.`id` = 74;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'jLIjGgXhUKr66y6H' WHERE `attributes`.`id` = 76;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'dhGEDNWnT5z0zLN2' WHERE `attributes`.`id` = 79;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cLfG75jxyY3GxZ9m' WHERE `attributes`.`id` = 82;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Y5cXvpSRYW55Zzug' WHERE `attributes`.`id` = 84;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'bAoM4K8bLPWnfk5D' WHERE `attributes`.`id` = 87;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'r30AWjdeNCBUIdjs' WHERE `attributes`.`id` = 101;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rhc10c20c2' WHERE `attributes`.`id` = 104;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rhc11020c' WHERE `attributes`.`id` = 106;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rhc22010c' WHERE `attributes`.`id` = 107;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rhc1c20c1c' WHERE `attributes`.`id` = 108;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rhc1c41c0c' WHERE `attributes`.`id` = 111;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rhc10c10c' WHERE `attributes`.`id` = 120;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'HIu2Alre3HSF5ZMV' WHERE `attributes`.`id` = 121;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'pKlx8wkxY39pT2se' WHERE `attributes`.`id` = 123;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '5o5jxH24tY46WW2m' WHERE `attributes`.`id` = 127;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'EXIei9G4DvFh4bWe' WHERE `attributes`.`id` = 131;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rhctcd' WHERE `attributes`.`id` = 132;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rbncjnc20' WHERE `attributes`.`id` = 134;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Ld4p6PVLD2bxYKbp' WHERE `attributes`.`id` = 138;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'RABr7B9oI9VmmN1L' WHERE `attributes`.`id` = 152;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'fjPH5EzVKldxkf88' WHERE `attributes`.`id` = 155;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 's6ITTzq0ZauLBSZb' WHERE `attributes`.`id` = 156;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'AbS6fp7pVKD3UVtT' WHERE `attributes`.`id` = 157;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'data_Cc0d1c' WHERE `attributes`.`id` = 159;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'data_00c2c' WHERE `attributes`.`id` = 160;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'do_d0c41' WHERE `attributes`.`id` = 161;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc5c2c' WHERE `attributes`.`id` = 163;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cccc_cc02c' WHERE `attributes`.`id` = 166;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_ccsa' WHERE `attributes`.`id` = 169;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_ccd4d2d' WHERE `attributes`.`id` = 170;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_s5s2d0d' WHERE `attributes`.`id` = 172;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'POf9NvTjBBUimuLM' WHERE `attributes`.`id` = 173;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc0d5dd' WHERE `attributes`.`id` = 175;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc20sa' WHERE `attributes`.`id` = 178;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_capdq' WHERE `attributes`.`id` = 180;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc20c5ds' WHERE `attributes`.`id` = 181;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cssq' WHERE `attributes`.`id` = 182;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'AkjyqedbzKBgRdza' WHERE `attributes`.`id` = 183;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc45' WHERE `attributes`.`id` = 184;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc_c520' WHERE `attributes`.`id` = 195;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c44c' WHERE `attributes`.`id` = 198;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_ccssa' WHERE `attributes`.`id` = 204;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ZI95box0JyKQjQIe' WHERE `attributes`.`id` = 205;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'd_ddc' WHERE `attributes`.`id` = 207;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc20ddd' WHERE `attributes`.`id` = 208;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc20aa' WHERE `attributes`.`id` = 209;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc20ss' WHERE `attributes`.`id` = 210;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc20c2' WHERE `attributes`.`id` = 211;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'caa41c' WHERE `attributes`.`id` = 212;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'aacaa41c' WHERE `attributes`.`id` = 213;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_ccaa52c' WHERE `attributes`.`id` = 214;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c44acqe' WHERE `attributes`.`id` = 215;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '3MJFAUtA3VxO4ds9' WHERE `attributes`.`id` = 225;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc_cc50ss' WHERE `attributes`.`id` = 226;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cccaac' WHERE `attributes`.`id` = 229;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc_cca50da' WHERE `attributes`.`id` = 232;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc_cc20aaq' WHERE `attributes`.`id` = 233;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc_ccc51ada' WHERE `attributes`.`id` = 235;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc54a' WHERE `attributes`.`id` = 236;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cca45ca' WHERE `attributes`.`id` = 239;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'qaOv9AAZZPmlOTN3' WHERE `attributes`.`id` = 240;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc_cc445a' WHERE `attributes`.`id` = 241;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cca_c748a' WHERE `attributes`.`id` = 242;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc558ac' WHERE `attributes`.`id` = 245;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc_ccpc_Cca' WHERE `attributes`.`id` = 246;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'tap__pes' WHERE `attributes`.`id` = 247;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'VnRABLzky2gwsbvc' WHERE `attributes`.`id` = 248;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'UCfNApNH5BQth7jg' WHERE `attributes`.`id` = 249;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'gFbLqcCyKAIfhjUa' WHERE `attributes`.`id` = 250;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'I5hCjZbLFL68bVT3' WHERE `attributes`.`id` = 251;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '6YYIs3NbwVXIfW20' WHERE `attributes`.`id` = 253;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'im4Js9IU9e9Q4tDn' WHERE `attributes`.`id` = 254;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c512dsa' WHERE `attributes`.`id` = 256;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c456a2' WHERE `attributes`.`id` = 257;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'F7Ez99H1y0W1zI1C' WHERE `attributes`.`id` = 258;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c24sdc51sdc' WHERE `attributes`.`id` = 259;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '0etfXyYFS5CXdpbX' WHERE `attributes`.`id` = 260;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'd325cd1' WHERE `attributes`.`id` = 262;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cs2d4c12' WHERE `attributes`.`id` = 264;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'SXMKwsHu9FO5wzEk' WHERE `attributes`.`id` = 266;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'bjCSB6Q4699Y39GG' WHERE `attributes`.`id` = 267;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c44cs' WHERE `attributes`.`id` = 268;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c202s' WHERE `attributes`.`id` = 269;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c20c2a' WHERE `attributes`.`id` = 270;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cca45caccc' WHERE `attributes`.`id` = 274;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'c_cc20aadddaad' WHERE `attributes`.`id` = 276;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'aaqsxxxa' WHERE `attributes`.`id` = 278;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc52a52' WHERE `attributes`.`id` = 279;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc20c20a' WHERE `attributes`.`id` = 282;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cca2020c' WHERE `attributes`.`id` = 284;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cc50a0c5' WHERE `attributes`.`id` = 285;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'caa41cddd' WHERE `attributes`.`id` = 292;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ccaedc' WHERE `attributes`.`id` = 294;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ceesd' WHERE `attributes`.`id` = 299;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'dt9pA1hryAwr2h9J' WHERE `attributes`.`id` = 300;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ccaxx' WHERE `attributes`.`id` = 301;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'clXeeQI93C3RWtLS' WHERE `attributes`.`id` = 302;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ccx' WHERE `attributes`.`id` = 303;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'RTi8hYxPmfSmQT86' WHERE `attributes`.`id` = 304;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'KqU1t7Fusp5zHgvi' WHERE `attributes`.`id` = 305;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'JOL1ipxXeZLdZWyr' WHERE `attributes`.`id` = 306;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'xxdxsw' WHERE `attributes`.`id` = 307;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '70Xi7sBYn2Bdm7cz' WHERE `attributes`.`id` = 308;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'AEqvw4LAO7KFqBM9' WHERE `attributes`.`id` = 309;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'wdWMAJYdlPV5zFFq' WHERE `attributes`.`id` = 310;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cczwwa' WHERE `attributes`.`id` = 311;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'w4OOTLKdpS4gSkJH' WHERE `attributes`.`id` = 312;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ccccsex' WHERE `attributes`.`id` = 313;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'tf7LZa28WDA7zaIs' WHERE `attributes`.`id` = 315;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '8Dm8sgx8zXOzpbPz' WHERE `attributes`.`id` = 316;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'v75LbO5qOSZljtDk' WHERE `attributes`.`id` = 317;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '3stPLh3delxRKyRC' WHERE `attributes`.`id` = 318;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'YnYARDptGz9e0fKr' WHERE `attributes`.`id` = 319;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'PU0DFOK7IYQDdrxv' WHERE `attributes`.`id` = 320;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'kCC95IEV447YkdNQ' WHERE `attributes`.`id` = 321;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'HBJGFYrEuYmUVwLZ' WHERE `attributes`.`id` = 322;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'KOd0MRyuvDA8C3RG' WHERE `attributes`.`id` = 323;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Xd5jFpvr5QwZl2XJ' WHERE `attributes`.`id` = 325;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'xT2k3khPYin0cqZO' WHERE `attributes`.`id` = 326;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cILnPF1hiXImnxSp' WHERE `attributes`.`id` = 327;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'l4ZQzcR9m24lS8RK' WHERE `attributes`.`id` = 328;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'kELSkDcAS3TNauSX' WHERE `attributes`.`id` = 329;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ZNwf9vVXUazSijku' WHERE `attributes`.`id` = 330;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'cxiagapove3R5Hy7' WHERE `attributes`.`id` = 331;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'HMGYvTPgSXn99Lry' WHERE `attributes`.`id` = 332;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'F50eBGpm7Y0AjxNP' WHERE `attributes`.`id` = 333;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '3uZ5WSxWAwCQpfYp' WHERE `attributes`.`id` = 334;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'NDC3sxuWLI6t0dvZ' WHERE `attributes`.`id` = 335;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '0knuaJQUVqJ7TH5U' WHERE `attributes`.`id` = 336;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'feo9bUiuCDKpggAr' WHERE `attributes`.`id` = 337;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '76qW8NSgcv6on2U1' WHERE `attributes`.`id` = 338;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'vG5y7lGpgokBDOKM' WHERE `attributes`.`id` = 339;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'nZaCNhyNNt0IejUK' WHERE `attributes`.`id` = 340;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Wxtwu0nIsEmMO6sR' WHERE `attributes`.`id` = 341;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'b6bUbOKy6b5cL9qn' WHERE `attributes`.`id` = 342;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'iC1BwXEXmCNsEmGK' WHERE `attributes`.`id` = 343;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '8Q26ojJYXqdlYBVy' WHERE `attributes`.`id` = 344;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'CaoKSpVMsaLfBNFu' WHERE `attributes`.`id` = 345;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'At5xxerFKlc6UfkR' WHERE `attributes`.`id` = 346;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '7SO8ei2gnQ0Vpi19' WHERE `attributes`.`id` = 347;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ZIPL4MS7aKmxMSrg' WHERE `attributes`.`id` = 348;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'eqQf5c4KXuKTJX3h' WHERE `attributes`.`id` = 349;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'JXNgmuOMy5T58fQ8' WHERE `attributes`.`id` = 351;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'VonUvkT5lKG1Z2Rl' WHERE `attributes`.`id` = 352;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '9dA83iKO7ehFykBS' WHERE `attributes`.`id` = 353;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'bnd0jcX71bMyPEf5' WHERE `attributes`.`id` = 354;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'R9rcNXcJFlCzrFOH' WHERE `attributes`.`id` = 355;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'QQxrZpakDaIAzZgL' WHERE `attributes`.`id` = 356;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'RQm5mcSZkvGYl0El' WHERE `attributes`.`id` = 357;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'mNU58qfYBIM6yTHb' WHERE `attributes`.`id` = 358;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'LllBT6weaQslubLu' WHERE `attributes`.`id` = 359;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ujD1vchbfKgHIxtN' WHERE `attributes`.`id` = 360;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'o3hiPoD0xVaks7pG' WHERE `attributes`.`id` = 361;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'dPckxFE41avuMTwZ' WHERE `attributes`.`id` = 362;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'EDeyx5hcyL60f4ht' WHERE `attributes`.`id` = 363;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'kiOnD0TYIyeZZrxA' WHERE `attributes`.`id` = 364;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'bsQcRd9eIbDX94pQ' WHERE `attributes`.`id` = 365;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '8LfOtg8B4PB2KxYK' WHERE `attributes`.`id` = 366;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'NXjJKUbho7uqjdNN' WHERE `attributes`.`id` = 367;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Drgog1oRXBN6owKF' WHERE `attributes`.`id` = 368;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'mZbvjklOkTWm3hf0' WHERE `attributes`.`id` = 369;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'XRuZYYJd33CcxaBf' WHERE `attributes`.`id` = 370;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'v95uZAw5VuUfhryj' WHERE `attributes`.`id` = 371;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'CdiR5DuanJcGfjhl' WHERE `attributes`.`id` = 372;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'SerMkYxENn4INLtD' WHERE `attributes`.`id` = 373;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '2lIw4ZneBml3SU2M' WHERE `attributes`.`id` = 374;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'jdXeHgzeKqzGf9N0' WHERE `attributes`.`id` = 375;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'BfSEXY8KHcpadPsb' WHERE `attributes`.`id` = 376;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'WgdYAKB5LHiE3vkN' WHERE `attributes`.`id` = 378;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'GO9Rv5ZhKGTRheNb' WHERE `attributes`.`id` = 379;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'zOT0Ro8ulTATt59Q' WHERE `attributes`.`id` = 380;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'tP3VHEBZyut7TP3o' WHERE `attributes`.`id` = 381;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'pAYs1FIU0qZ68Dyp' WHERE `attributes`.`id` = 382;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'CZOngnLfms8HXy6F' WHERE `attributes`.`id` = 383;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'oD3NlULDTdh9v5my' WHERE `attributes`.`id` = 385;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'vzOUsty3JjUf3qnI' WHERE `attributes`.`id` = 386;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'nG0D5ufIIP9xTClB' WHERE `attributes`.`id` = 387;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'OQFvz75sSbENujwa' WHERE `attributes`.`id` = 388;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'lP87who8vSabxTRv' WHERE `attributes`.`id` = 389;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'SNmsPxxQMFyA2OzZ' WHERE `attributes`.`id` = 390;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'yATQ1bP22xDlC9ro' WHERE `attributes`.`id` = 391;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ZyuSklPAh7BNNIBM' WHERE `attributes`.`id` = 392;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'oIhoNqfYPHXHI8VT' WHERE `attributes`.`id` = 393;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'tdL0JEEGhRRgWVvl' WHERE `attributes`.`id` = 394;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'JyrQBjHB2V7J9lYC' WHERE `attributes`.`id` = 395;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Iudr9z9ATrgmAB4v' WHERE `attributes`.`id` = 396;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Bet96n8HNLAUaED9' WHERE `attributes`.`id` = 397;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'fK9okb5DDYuVRAyn' WHERE `attributes`.`id` = 398;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'm0J5hT9EBazM0Dgg' WHERE `attributes`.`id` = 399;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'S1SlEXujjsoKiZnM' WHERE `attributes`.`id` = 400;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'KHXCinRQ2mJxmn8W' WHERE `attributes`.`id` = 401;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'kJZJHRvNUubWlFlq' WHERE `attributes`.`id` = 402;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'SrqeIBqc7rh5wjXc' WHERE `attributes`.`id` = 403;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'I7ooneS7kgS3g06X' WHERE `attributes`.`id` = 404;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'i09QJwLy5OK7RpaN' WHERE `attributes`.`id` = 405;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'VPddavdZj05abkJB' WHERE `attributes`.`id` = 406;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'gkooM71e503Tq86k' WHERE `attributes`.`id` = 407;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'u5nBS2Ql15K4Lnsp' WHERE `attributes`.`id` = 408;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'uS5WQblh5yiCrb3I' WHERE `attributes`.`id` = 409;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'uQj9O9T0mj6ZakND' WHERE `attributes`.`id` = 410;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '6ABF8bb0WrLQHvkT' WHERE `attributes`.`id` = 411;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'KFfsvb8Op3DYP9FX' WHERE `attributes`.`id` = 412;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Wl6HFWg6NjdCOFoO' WHERE `attributes`.`id` = 413;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'BiAnb0q5KtXeCEgX' WHERE `attributes`.`id` = 414;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ggkQ7JmrOeDi1Bmb' WHERE `attributes`.`id` = 415;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'hkf9KQqA6dAblxsT' WHERE `attributes`.`id` = 416;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'nYjnHEHW6RO4aTya' WHERE `attributes`.`id` = 417;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'BVK4Dd3CFQmGNJtF' WHERE `attributes`.`id` = 418;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'mVATuRDcaqiKtJ7g' WHERE `attributes`.`id` = 419;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '9U6UFeqb1IAH3zLk' WHERE `attributes`.`id` = 420;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '5eo9MYYTk4dbeJhU' WHERE `attributes`.`id` = 421;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'gx8qrk93lnTcfwGu' WHERE `attributes`.`id` = 422;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'QdZutpbJsVLjB1eP' WHERE `attributes`.`id` = 423;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'DVPDYZX6NbEm3rqK' WHERE `attributes`.`id` = 424;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'qlDC8iP1q3ubXF4U' WHERE `attributes`.`id` = 425;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'w5c1DPJ5IbRQj33U' WHERE `attributes`.`id` = 426;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Iiuj9WJxrEe5LFot' WHERE `attributes`.`id` = 427;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '9Ks1Xr2LZudzSp6o' WHERE `attributes`.`id` = 428;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ejCHbfAVkkscPfBW' WHERE `attributes`.`id` = 429;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'qyOaz7pq5oPYjaVY' WHERE `attributes`.`id` = 430;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'FS8qVUzeFCkd08Z0' WHERE `attributes`.`id` = 431;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'a3jX7BrdyaBN2hDV' WHERE `attributes`.`id` = 432;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'LjciFfXAYyQLfgit' WHERE `attributes`.`id` = 433;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rVRsUXYY6SX7ih3s' WHERE `attributes`.`id` = 439;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'XqOZVJ09jnVq4JWR' WHERE `attributes`.`id` = 440;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '5L0ggiL2XZesMZvK' WHERE `attributes`.`id` = 444;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '1qGDK0xPVpwCgSq4' WHERE `attributes`.`id` = 445;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'YhrTRm8vMc0tgupD' WHERE `attributes`.`id` = 446;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'WIToK1iwCz7wvB2s' WHERE `attributes`.`id` = 448;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'JofAESR2eeMer226' WHERE `attributes`.`id` = 449;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '3eJFH48WUrzUg092' WHERE `attributes`.`id` = 450;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '6g42bPLQuvKQvmZA' WHERE `attributes`.`id` = 451;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'nVyXomtHlZvY1S12' WHERE `attributes`.`id` = 452;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'UNj41haR9UCdFyoZ' WHERE `attributes`.`id` = 453;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '07CF89AYEyCQdI54' WHERE `attributes`.`id` = 454;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'description' WHERE `attributes`.`id` = 455;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'UXf8hpD2RHO2w4Zm' WHERE `attributes`.`id` = 456;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ZGKdC3BNhf52vBDu' WHERE `attributes`.`id` = 457;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'rLoLXJEeBZJuqeeH' WHERE `attributes`.`id` = 458;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'H6yTYbgysZW2aCBn' WHERE `attributes`.`id` = 459;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '3BlnHKhXvk4OMhmc' WHERE `attributes`.`id` = 460;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '4bsYr4soetVFFKqS' WHERE `attributes`.`id` = 461;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Nbl6kGE3V7faulaZ' WHERE `attributes`.`id` = 462;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'r4AJfUCbShkAVrSj' WHERE `attributes`.`id` = 463;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'gmofOMLS5mj2kpOM' WHERE `attributes`.`id` = 464;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '39YF8eqIWnvKLedA' WHERE `attributes`.`id` = 465;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'niF8AJfF2bbyydif' WHERE `attributes`.`id` = 466;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'eQksztIvMarY9XSq' WHERE `attributes`.`id` = 467;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'yWc1TPZo34X0btrE' WHERE `attributes`.`id` = 468;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Kiug1YOiziKltz0J' WHERE `attributes`.`id` = 469;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'LG5gAmC3mI0Ywbmn' WHERE `attributes`.`id` = 470;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'fJx0VwKa6ig8B5m3' WHERE `attributes`.`id` = 471;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'prvt2Qgq6EYZU6YC' WHERE `attributes`.`id` = 472;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'kaHcHDhZl2NkwyEe' WHERE `attributes`.`id` = 473;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'RpxnoCVIBBsXZfh4' WHERE `attributes`.`id` = 474;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'kJp6tE47sxnqmF6w' WHERE `attributes`.`id` = 475;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'BuDiG3wXmdmzHxvp' WHERE `attributes`.`id` = 476;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'fkmJc6DAudSvs5fj' WHERE `attributes`.`id` = 477;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'w2qfK4o8FvoWuToO' WHERE `attributes`.`id` = 478;");

        DB::statement("UPDATE `attributes` SET `backup_code` = '7kUQKbxiZq9m1h5j' WHERE `attributes`.`id` = 479;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'nQySJMv5RGvyAGed' WHERE `attributes`.`id` = 480;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'Qv2v74t1KPpl7GWa' WHERE `attributes`.`id` = 481;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'QzLtH7rwnv80zArd' WHERE `attributes`.`id` = 482;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'wEs1gD9yCNHw2EtQ' WHERE `attributes`.`id` = 483;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'zJ3NeM3qprudqXRz' WHERE `attributes`.`id` = 484;");

        DB::statement("UPDATE `attributes` SET `backup_code` = 'ssoIzRjYVWIMbFsw' WHERE `attributes`.`id` = 485;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
