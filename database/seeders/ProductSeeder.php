<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'id' => 1020,
                'name' => 'Bikini Animal Print',
                'price_unit' => 10.00,
                'price_dozen' => 61.00,
                'price_quarter' => 26.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/bikinis/bikini-animal-print-1.jpg',
                    'assets/img/bikinis/bikini-animal-print-2.jpg',
                    'assets/img/bikinis/bikini-animal-print-3.jpg',
                    'assets/img/bikinis/bikini-animal-print-4.jpg',
                    'assets/img/bikinis/bikini-animal-print-5.jpg'
                ],
                'description' => '🌟 Descubre la comodidad y el glamour del Bikini Animal Print en 100% algodón. Un estampado salvaje, suave y fresco que resalta tu estilo. Elige entre 12 vibrantes colores y luce siempre irresistible. 💖',
                'category' => 'bikini',
                'slug' => 'bikini-animal-print',
            ],
            [
                'id' => 1024,
                'name' => 'Bikini Blonda',
                'price_unit' => 9.00,
                'price_dozen' => 58.00,
                'price_quarter' => 24.00,
                'price' => 9.00,
                'images' => [
                    'assets/img/bikinis/bikini-blonda-1.jpg',
                    'assets/img/bikinis/bikini-blonda-2.jpg',
                    'assets/img/bikinis/bikini-blonda-3.jpg',
                    'assets/img/bikinis/bikini-blonda-4.jpg',
                    'assets/img/bikinis/bikini-blonda-5.jpg'
                ],
                'description' => '🌸 Una prenda pensada para realzar tu feminidad. El Bikini Blonda combina delicadeza y frescura con un detalle de encaje que enamora. Hecho en 100% algodón y disponible en 12 colores, es el equilibrio ideal entre comodidad y estilo. ✨',
                'category' => 'bikini',
                'slug' => 'bikini-blonda',
            ],
            [
                'id' => 1007,
                'name' => 'Bikina Blondita Completa',
                'price_unit' => 10.00,
                'price_dozen' => 65.00,
                'price_quarter' => 27.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/bikinis/bikini-mini-blonda-1.jpg',
                    'assets/img/bikinis/bikini-mini-blonda-2.jpg',
                    'assets/img/bikinis/bikini-mini-blonda-3.jpg',
                    'assets/img/bikinis/bikini-mini-blonda-4.jpg',
                    'assets/img/bikinis/bikini-mini-blonda-5.jpg'
                ],
                'description' => '✨ Descubre el encanto del Bikini Mini Blonda: 100% algodón, frescura incomparable y un delicado acabado de blonda que rodea toda la prenda. Elegancia y comodidad en 12 irresistibles colores. 🌸',
                'category' => 'bikini',
                'slug' => 'bikina-blondita-completa',
            ],
            [
                'id' => 1022,
                'name' => 'Bikini Clasico',
                'price_unit' => 9.00,
                'price_dozen' => 51.00,
                'price_quarter' => 25.50,
                'price' => 9.00,
                'images' => [
                    'assets/img/bikinis/bikini-clasico-1.jpg',
                    'assets/img/bikinis/bikini-clasico-2.jpg',
                    'assets/img/bikinis/bikini-clasico-3.jpg',
                    'assets/img/bikinis/bikini-clasico-4.jpg',
                    'assets/img/bikinis/bikini-clasico-5.jpg'
                ],
                'description' => '🌸 Bikini Clásico: un diseño atemporal con delicado sesgo alrededor y lazo central que realza su encanto. Confeccionado en algodón de alta calidad, ofrece comodidad, durabilidad y un ajuste perfecto. Disponible en 12 colores vibrantes para combinar con tu estilo único. ✨',
                'category' => 'bikini',
                'slug' => 'bikini-clasico',
            ],
            [
                'id' => 1034,
                'name' => 'Bikini Gitana',
                'price_unit' => 12.00,
                'price_dozen' => 74.00,
                'price_quarter' => 31.00,
                'price' => 12.00,
                'images' => [
                    'assets/img/bikinis/bikini-gitana-1.jpg',
                    'assets/img/bikinis/bikini-gitana-2.jpg',
                    'assets/img/bikinis/bikini-gitana-3.jpg',
                    'assets/img/bikinis/bikini-gitana-4.jpg',
                    'assets/img/bikinis/bikini-gitana-5.jpg'
                ],
                'description' => '✨ BIKINI GITANA: 100% ALGODÓN, SUAVE Y DELICADO CON TU PIEL. DISEÑO CON BLONDA A LOS COSTADOS, SESGO EN LA CINTURA Y SUTIL TUL DELANTERO QUE APORTA ELEGANCIA Y FEMINIDAD. CONFECCIONADO CON CUIDADO PARA BRINDAR COMODIDAD Y RESISTENCIA.❤️',
                'category' => 'bikini',
                'slug' => 'bikini-gitana',
            ],
            [
                'id' => 1033,
                'name' => 'Bikini Pretina Ancha',
                'price_unit' => 10.00,
                'price_dozen' => 62.00,
                'price_quarter' => 26.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/bikinis/bikini-pretina-ancha-1.jpg',
                    'assets/img/bikinis/bikini-pretina-ancha-2.jpg',
                    'assets/img/bikinis/bikini-pretina-ancha-3.jpg',
                    'assets/img/bikinis/bikini-pretina-ancha-4.jpg',
                    'assets/img/bikinis/bikini-pretina-ancha-5.jpg'
                ],
                'description' => '🌟 Bikini Pretina Ancha: comodidad y estilo en un solo diseño. Su pretina ancha moldea suavemente tu silueta y realza la cintura, brindando soporte y libertad de movimiento. Confeccionado con materiales de alta calidad, es perfecto para la playa, la piscina o un look veraniego único.👙',
                'category' => 'bikini',
                'slug' => 'bikini-pretina-ancha',
            ],
            [
                'id' => 1028,
                'name' => 'Cachetero Blonda con Logo',
                'price_unit' => 11.00,
                'price_dozen' => 70.00,
                'price_quarter' => 38.00,
                'price' => 11.00,
                'images' => [
                    'assets/img/cacheteros/cachetero-blonda-logo-1.jpg',
                    'assets/img/cacheteros/cachetero-blonda-logo-2.jpg',
                    'assets/img/cacheteros/cachetero-blonda-logo-3.jpg',
                    'assets/img/cacheteros/cachetero-blonda-logo-4.jpg',
                    'assets/img/cacheteros/cachetero-blonda-logo-5.jpg'
                ],
                'description' => '💎 El cachetero de blonda con logo exclusivo Marbellín une comodidad y elegancia en una prenda especial. Confeccionado en microfibra de alta calidad, ofrece un calce suave con elástico en la cintura y un delicado dije en forma de corazón. Su interior 100% algodón aporta frescura, mientras que sus colores reactivos mantienen un tono vibrante y duradero. ✨',
                'category' => 'cachetero',
                'slug' => 'cachetero-blonda-con-logo',
            ],
            [
                'id' => 1072,
                'name' => 'Cachetero Corazon Estampado',
                'price_unit' => 11.00,
                'price_dozen' => 70.00,
                'price_quarter' => 38.00,
                'price' => 11.00,
                'images' => [
                    'assets/img/cacheteros/cachetero-corazon-estampado-1.jpg',
                    'assets/img/cacheteros/cachetero-corazon-estampado-2.jpg',
                    'assets/img/cacheteros/cachetero-corazon-estampado-3.jpg',
                    'assets/img/cacheteros/cachetero-corazon-estampado-4.jpg',
                    'assets/img/cacheteros/cachetero-corazon-estampado-5.jpg'
                ],
                'description' => '🌺 El calzón cachetero estampado de flores está confeccionado en suave algodón para ofrecer comodidad y frescura durante todo el día. Su elástico de 2.5 cm en la cintura se adapta perfectamente a tu figura sin apretar, mientras que el diseño recubierto en las piernas evita marcas en la piel y permite moverte con total libertad. Un toque floral que transforma cada día en algo especial. ✨',
                'category' => 'cachetero',
                'slug' => 'cachetero-corazon-estampado',
            ],
            [
                'id' => 1027,
                'name' => 'Cachetero Corazon',
                'price_unit' => 10.00,
                'price_dozen' => 64.00,
                'price_quarter' => 35.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/cacheteros/cachetero-corazon-1.jpg',
                    'assets/img/cacheteros/cachetero-corazon-2.jpg',
                    'assets/img/cacheteros/cachetero-corazon-3.jpg',
                    'assets/img/cacheteros/cachetero-corazon-4.jpg',
                    'assets/img/cacheteros/cachetero-corazon-5.jpg'
                ],
                'description' => '💖 El cachetero corazón está confeccionado en 100% algodón, ofreciendo suavidad y transpirabilidad ideales para el uso diario. Con pretina de 7 cm de altura en la cintura y un diseño en color entero, se complementa con un delicado detalle de corazón en la parte delantera que añade un toque de dulzura y encanto a tu lencería. ✨',
                'category' => 'cachetero',
                'slug' => 'cachetero-corazon',
            ],
            [
                'id' => 1052,
                'name' => 'Cachetero Dije Estampado',
                'price_unit' => 10.00,
                'price_dozen' => 64.00,
                'price_quarter' => 34.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/cacheteros/cachetero-dije-estampado-1.jpg',
                    'assets/img/cacheteros/cachetero-dije-estampado-2.jpg',
                    'assets/img/cacheteros/cachetero-dije-estampado-3.jpg',
                    'assets/img/cacheteros/cachetero-dije-estampado-4.jpg',
                    'assets/img/cacheteros/cachetero-dije-estampado-5.jpg'
                ],
                'description' => '🌸 El cachetero dije estampado está confeccionado en 100% algodón, ofreciendo suavidad y excelente transpirabilidad. Su diseño con estampados divertidos y modernos lo convierte en una prenda única que combina comodidad y estilo. Disponible en tallas S, M, L y XL, se adapta a cada silueta brindando un ajuste cómodo y favorecedor, ideal para el uso diario. ✨',
                'category' => 'cachetero',
                'slug' => 'cachetero-dije-estampado',
            ],
            [
                'id' => 1025,
                'name' => 'Cachetero Dije',
                'price_unit' => 8.00,
                'price_dozen' => 53.00,
                'price_quarter' => 27.00,
                'price' => 8.00,
                'images' => [
                    'assets/img/cacheteros/cachetero-dije-1.jpg',
                    'assets/img/cacheteros/cachetero-dije-2.jpg',
                    'assets/img/cacheteros/cachetero-dije-3.jpg',
                    'assets/img/cacheteros/cachetero-dije-4.jpg',
                    'assets/img/cacheteros/cachetero-dije-5.jpg'
                ],
                'description' => '💖 El cachetero dije está confeccionado en 100% algodón, diseñado para brindar suavidad, frescura y comodidad en el uso diario. Disponible en 12 colores enteros y en tallas S, M, L y XL, se adapta a cada silueta ofreciendo un ajuste cómodo y favorecedor.🌟',
                'category' => 'cachetero',
                'slug' => 'cachetero-dije',
            ],
            [
                'id' => 1045,
                'name' => 'Cachetero Encaje Atras',
                'price_unit' => 10.00,
                'price_dozen' => 67.00,
                'price_quarter' => 35.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/cacheteros/cachetero-encaje-atras-1.jpg',
                    'assets/img/cacheteros/cachetero-encaje-atras-2.jpg',
                    'assets/img/cacheteros/cachetero-encaje-atras-3.jpg',
                    'assets/img/cacheteros/cachetero-encaje-atras-4.jpg',
                    'assets/img/cacheteros/cachetero-encaje-atras-5.jpg'
                ],
                'description' => '🌷 Presentamos un calzón exclusivo que une estilo y confort, realzando tu figura con encaje posterior de toque sensual y femenino. La parte delantera con doble tela aporta suavidad y cobertura, mientras el elástico en la cintura se adapta sin marcar la piel. Una prenda íntima ideal para quienes buscan elegancia y bienestar en una sola pieza. ✨',
                'category' => 'cachetero',
                'slug' => 'cachetero-encaje-atras',
            ],
            [
                'id' => 1026,
                'name' => 'Semi Hilo Clasico',
                'price_unit' => 10.00,
                'price_dozen' => 54.00,
                'price_quarter' => 27.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/semi/semi-hilo-clasico-1.jpg',
                    'assets/img/semi/semi-hilo-clasico-2.jpg',
                    'assets/img/semi/semi-hilo-clasico-3.jpg',
                    'assets/img/semi/semi-hilo-clasico-4.jpg',
                    'assets/img/semi/semi-hilo-clasico-5.jpg'
                ],
                'description' => '🌸 El semi hilo clásico combina sencillez y encanto en un diseño inspirado en el bikini clásico, con acabado semi hilo que realza la silueta. Confeccionado en microfibra suave para un calce cómodo, luce un delicado lazo al centro que aporta un toque femenino y coqueto.❤️',
                'category' => 'semihilo',
                'slug' => 'semi-hilo-clasico',
            ],
            [
                'id' => 1031,
                'name' => 'Semi Hilo Dije',
                'price_unit' => 10.00,
                'price_dozen' => 50.00,
                'price_quarter' => 21.00,
                'price' => 8.00,
                'images' => [
                    'assets/img/semi/semi-hilo-dije-1.jpg',
                    'assets/img/semi/semi-hilo-dije-2.jpg',
                    'assets/img/semi/semi-hilo-dije-3.jpg',
                    'assets/img/semi/semi-hilo-dije-4.jpg',
                    'assets/img/semi/semi-hilo-dije-5.jpg'
                ],
                'description' => '💎 El semi hilo dije combina sensualidad y comodidad en una sola prenda. Confeccionado en microfibra suave, ofrece un calce ligero que realza la figura, con diseño posterior semi hilo para un toque atrevido sin perder confort. El delicado dije en forma de corazón resalta el estilo de Marbellín, mientras su interior 100% algodón aporta frescura y suavidad. ✨',
                'category' => 'semihilo',
                'slug' => 'semi-hilo-dije',
            ],
            [
                'id' => 1032,
                'name' => 'Semi Hilo Pretina Ancha',
                'price_unit' => 10.00,
                'price_dozen' => 55.00,
                'price_quarter' => 27.50,
                'price' => 9.00,
                'images' => [
                    'assets/img/semi/semi-hilo-pretina-ancha-1.jpg',
                    'assets/img/semi/semi-hilo-pretina-ancha-2.jpg',
                    'assets/img/semi/semi-hilo-pretina-ancha-3.jpg',
                    'assets/img/semi/semi-hilo-pretina-ancha-4.jpg',
                    'assets/img/semi/semi-hilo-pretina-ancha-5.jpg'
                ],
                'description' => '🌷 El semi hilo pretina ancha combina estilo y confort en una prenda esencial. Confeccionado en 100% algodón, ofrece suavidad y frescura inigualables. Su pretina de 5 cm en la cintura brinda sujeción cómoda, mientras el elástico plano en las piernas garantiza un ajuste delicado sin marcar la piel. ✨',
                'category' => 'semihilo',
                'slug' => 'semi-hilo-pretina-ancha',
            ],
            [
                'id' => 1001,
                'name' => 'Topsito Clásico',
                'price_unit' => 10.00,
                'price_dozen' => 67.00,
                'price_quarter' => 27.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/topsitos/topsito-clasico-1.jpg',
                    'assets/img/topsitos/topsito-clasico-2.jpg'
                ],
                'description' => 'Topsito de corte clásico, esencial para cualquier guardarropa íntimo. Su diseño simple y elegante lo convierte en una prenda versátil y atemporal.',
                'category' => 'topsito',
                'slug' => 'topsito-clasico',
            ],
            [
                'id' => 1002,
                'name' => 'Topsito con Tirante',
                'price_unit' => 10.00,
                'price_dozen' => 67.00,
                'price_quarter' => 27.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/topsitos/topsito-con-tirante-1.jpg',
                    'assets/img/topsitos/topsito-con-tirante-2.jpg'
                ],
                'description' => 'Topsito cómodo con tirantes ajustables, ideal para el uso diario. Ofrece un ajuste perfecto y realza la figura con sutileza.',
                'category' => 'topsito',
                'slug' => 'topsito-con-tirante',
            ],
            [
                'id' => 1003,
                'name' => 'Topsito Olímpico',
                'price_unit' => 10.00,
                'price_dozen' => 67.00,
                'price_quarter' => 27.00,
                'price' => 10.00,
                'images' => [
                    'assets/img/topsitos/topsito-olimpico-1.jpg',
                    'assets/img/topsitos/topsito-olimpico-2.jpg'
                ],
                'description' => 'Topsito de estilo deportivo tipo olímpico, diseñado para brindar soporte firme y comodidad durante todo el día, combinando practicidad y un toque moderno.',
                'category' => 'topsito',
                'slug' => 'topsito-olimpico',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['id' => $product['id']], $product);
        }
    }
}
