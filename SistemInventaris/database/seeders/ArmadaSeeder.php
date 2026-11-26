<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['INV-001', 'Forklift Diesel', 'DOC-MNT-2023-011', 'FK-35D-2021-0891'],
            ['INV-002', 'Pick-up Box', 'DOC-MNT-2023-045', 'PU-L300-2019-4412'],
            ['INV-003', 'Forklift Elektrik', 'DOC-MNT-2024-002', 'FKE-18E-2022-0034'],
            ['INV-004', 'Truk Engkel', 'DOC-MNT-2023-108', 'TRK-FE71-2018-9102'],
            ['INV-005', 'Pick-up Open Cargo', 'DOC-MNT-2023-087', 'PU-GRM-2020-5521'],
            ['INV-006', 'Mobil Operasional SUV', 'DOC-MNT-2024-019', 'MO-ANF-2021-3310'],
            ['INV-007', 'Reach Truck', 'DOC-MNT-2023-062', 'RT-BT20-2020-1189'],
            ['INV-008', 'Truk Blind Van', 'DOC-MNT-2023-094', 'BV-APV-2019-7832'],
            ['INV-009', 'Truk Tronton Box', 'DOC-MNT-2023-115', 'TT-FL260-2017-0411'],
            ['INV-010', 'Forklift LPG', 'DOC-MNT-2024-005', 'FK-25G-2021-6604'],
            ['INV-011', 'Pick-up Double Cabin', 'DOC-MNT-2024-031', 'PU-DMX-2022-8910'],
            ['INV-012', 'Tow Tractor', 'DOC-MNT-2023-053', 'TT-TG30-2018-2290'],
            ['INV-013', 'Mobil Operasional MPV', 'DOC-MNT-2023-078', 'MO-AVZ-2020-4109'],
            ['INV-014', 'Forklift Heavy Duty', 'DOC-MNT-2023-120', 'FK-100D-2016-0102'],
            ['INV-015', 'Truk Wingbox', 'DOC-MNT-2024-012', 'WB-GXZ-2021-7721'],
            ['INV-016', 'Hand Stacker Elektrik', 'DOC-MNT-2024-040', 'HS-15E-2023-0051'],
            ['INV-017', 'Pick-up Box', 'DOC-MNT-2023-099', 'PU-L300-2021-4498'],
            ['INV-018', 'Mobil Minibus Operasional', 'DOC-MNT-2023-033', 'MO-HIC-2019-3388'],
            ['INV-019', 'Forklift Diesel', 'DOC-MNT-2024-022', 'FK-50D-2022-9012'],
            ['INV-020', 'Truk Dump', 'DOC-MNT-2023-142', 'DT-FM260-2018-6120'],
            ['INV-021', 'Order Picker', 'DOC-MNT-2024-008', 'OP-V10-2021-0983'],
            ['INV-022', 'Pick-up Open Cargo', 'DOC-MNT-2023-019', 'PU-CST-2017-1234'],
            ['INV-023', 'Forklift Elektrik', 'DOC-MNT-2024-051', 'FKE-25E-2023-0144'],
            ['INV-024', 'Truk CDE Box', 'DOC-MNT-2023-071', 'TRK-NK71-2020-8812'],
            ['INV-025', 'Mobil Operasional Sedan', 'DOC-MNT-2024-015', 'MO-ALT-2022-5001'],
        ];

        $payload = array_map(fn (array $row) => [
            'id' => $row[0],
            'jenis_kendaraan' => $row[1],
            'no_dokumen_perawatan' => $row[2],
            'no_seri_kendaraan' => $row[3],
        ], $rows);

        DB::table('data_armada')->upsert(
            $payload,
            ['id'],
            ['jenis_kendaraan', 'no_dokumen_perawatan', 'no_seri_kendaraan']
        );
    }
}
