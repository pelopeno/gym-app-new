<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        $reviews = [
            [
                'id' => 1,
                'title' => 'Public-key zero administration infrastructure',
                'content' => 'Proin eu mi. Nulla ac enim.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-04-12', // CORRECTED FORMAT
            ],
            [
                'id' => 2,
                'title' => 'Up-sized disintermediate focus group',
                'content' => 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-06-09', // CORRECTED FORMAT
            ],
            [
                'id' => 3,
                'title' => 'Future-proofed static definition',
                'content' => 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-12-24', // CORRECTED FORMAT
            ],
            [
                'id' => 4,
                'title' => 'Adaptive next generation extranet',
                'content' => 'Phasellus sit amet erat. Nulla tempus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-04-28', // CORRECTED FORMAT
            ],
            [
                'id' => 5,
                'title' => 'Cross-group needs-based task-force',
                'content' => 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-08-05', // CORRECTED FORMAT
            ],
            [
                'id' => 6,
                'title' => 'Extended methodical conglomeration',
                'content' => 'Nam dui.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-06-02', // CORRECTED FORMAT
            ],
            [
                'id' => 7,
                'title' => 'Progressive real-time toolset',
                'content' => 'Aliquam erat volutpat.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-11-17', // CORRECTED FORMAT
            ],
            [
                'id' => 8,
                'title' => 'Mandatory logistical project',
                'content' => 'Ut at dolor quis odio consequat varius. Integer ac leo.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-01-02', // CORRECTED FORMAT
            ],
            [
                'id' => 9,
                'title' => 'Balanced bandwidth-monitored orchestration',
                'content' => 'In sagittis dui vel nisl.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-12-28', // CORRECTED FORMAT
            ],
            [
                'id' => 10,
                'title' => 'Proactive fault-tolerant data-warehouse',
                'content' => 'In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-10-13', // CORRECTED FORMAT
            ],
            [
                'id' => 11,
                'title' => 'Robust scalable function',
                'content' => 'Integer non velit.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-04-15', // CORRECTED FORMAT
            ],
            [
                'id' => 12,
                'title' => 'Assimilated bifurcated process improvement',
                'content' => 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-12-25', // CORRECTED FORMAT
            ],
            [
                'id' => 13,
                'title' => 'Grass-roots zero tolerance moratorium',
                'content' => 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-16', // CORRECTED FORMAT
            ],
            [
                'id' => 14,
                'title' => 'Open-source 6th generation extranet',
                'content' => 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-04-08', // CORRECTED FORMAT
            ],
            [
                'id' => 15,
                'title' => 'Focused value-added adapter',
                'content' => 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-04-11', // CORRECTED FORMAT
            ],
            [
                'id' => 16,
                'title' => 'Realigned web-enabled application',
                'content' => 'Suspendisse potenti. Nullam porttitor lacus at turpis.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-02-23', // CORRECTED FORMAT
            ],
            [
                'id' => 17,
                'title' => 'Multi-layered real-time policy',
                'content' => 'Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam. Nam tristique tortor eu pede.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-11-15', // CORRECTED FORMAT
            ],
            [
                'id' => 18,
                'title' => 'Multi-tiered background extranet',
                'content' => 'Vivamus tortor. Duis mattis egestas metus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-23', // CORRECTED FORMAT
            ],
            [
                'id' => 19,
                'title' => 'Versatile demand-driven capacity',
                'content' => 'Nulla mollis molestie lorem. Quisque ut erat.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-07-22', // CORRECTED FORMAT
            ],
            [
                'id' => 20,
                'title' => 'Robust encompassing concept',
                'content' => 'Etiam vel augue.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-10-06', // CORRECTED FORMAT
            ],
            [
                'id' => 21,
                'title' => 'Adaptive disintermediate conglomeration',
                'content' => 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-11-28', // CORRECTED FORMAT
            ],
            [
                'id' => 22,
                'title' => 'Compatible fault-tolerant core',
                'content' => 'In eleifend quam a odio.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-10-01', // CORRECTED FORMAT
            ],
            [
                'id' => 23,
                'title' => 'Open-architected client-server methodology',
                'content' => 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-09-02', // CORRECTED FORMAT
            ],
            [
                'id' => 24,
                'title' => 'Open-source 4th generation standardization',
                'content' => 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-10-29', // CORRECTED FORMAT
            ],
            [
                'id' => 25,
                'title' => 'Reduced multimedia system engine',
                'content' => 'Sed vel enim sit amet nunc viverra dapibus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-05-06', // CORRECTED FORMAT
            ],
            [
                'id' => 26,
                'title' => 'Managed intermediate success',
                'content' => 'Pellentesque at nulla. Suspendisse potenti.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-20', // CORRECTED FORMAT
            ],
            [
                'id' => 27,
                'title' => 'Multi-channelled intermediate groupware',
                'content' => 'Etiam pretium iaculis justo.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-08-22', // CORRECTED FORMAT
            ],
            [
                'id' => 28,
                'title' => 'Realigned global focus group',
                'content' => 'Donec ut dolor.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-12-10', // CORRECTED FORMAT
            ],
            [
                'id' => 29,
                'title' => 'Function-based clear-thinking alliance',
                'content' => 'Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-10-03', // CORRECTED FORMAT
            ],
            [
                'id' => 30,
                'title' => 'Self-enabling mission-critical solution',
                'content' => 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-06-28', // CORRECTED FORMAT
            ],
            [
                'id' => 31,
                'title' => 'Public-key logistical circuit',
                'content' => 'Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam. Nam tristique tortor eu pede.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-12-20', // CORRECTED FORMAT
            ],
            [
                'id' => 32,
                'title' => 'Multi-layered high-level model',
                'content' => 'Curabitur at ipsum ac tellus semper interdum.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-08-24', // CORRECTED FORMAT
            ],
            [
                'id' => 33,
                'title' => 'De-engineered asymmetric help-desk',
                'content' => 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-06-16', // CORRECTED FORMAT
            ],
            [
                'id' => 34,
                'title' => 'User-centric motivating portal',
                'content' => 'Sed vel enim sit amet nunc viverra dapibus.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-11-21', // CORRECTED FORMAT
            ],
            [
                'id' => 35,
                'title' => 'Cloned bifurcated algorithm',
                'content' => 'Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-11-24', // CORRECTED FORMAT
            ],
            [
                'id' => 36,
                'title' => 'Multi-lateral multi-tasking database',
                'content' => 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-02-05', // CORRECTED FORMAT
            ],
            [
                'id' => 37,
                'title' => 'Cloned asynchronous open system',
                'content' => 'Nunc nisl.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-16', // CORRECTED FORMAT
            ],
            [
                'id' => 38,
                'title' => 'Persistent interactive parallelism',
                'content' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-07-25', // CORRECTED FORMAT
            ],
            [
                'id' => 39,
                'title' => 'Multi-layered tangible approach',
                'content' => 'Integer ac neque. Duis bibendum.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-01-28', // CORRECTED FORMAT
            ],
            [
                'id' => 40,
                'title' => 'User-friendly eco-centric orchestration',
                'content' => 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-05-26', // CORRECTED FORMAT
            ],
            [
                'id' => 41,
                'title' => 'Decentralized client-driven customer loyalty',
                'content' => 'Proin risus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-08-06', // CORRECTED FORMAT
            ],
            [
                'id' => 42,
                'title' => 'Stand-alone maximized productivity',
                'content' => 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-06-24', // CORRECTED FORMAT
            ],
            [
                'id' => 43,
                'title' => 'Down-sized stable parallelism',
                'content' => 'Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-05-23', // CORRECTED FORMAT
            ],
            [
                'id' => 44,
                'title' => 'Team-oriented foreground parallelism',
                'content' => 'Phasellus sit amet erat. Nulla tempus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-09-01', // CORRECTED FORMAT
            ],
            [
                'id' => 45,
                'title' => 'Operative solution-oriented open architecture',
                'content' => 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-27', // CORRECTED FORMAT
            ],
            [
                'id' => 46,
                'title' => 'Reverse-engineered executive database',
                'content' => 'Vestibulum sed magna at nunc commodo placerat. Praesent blandit.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-07-06', // CORRECTED FORMAT
            ],
            [
                'id' => 47,
                'title' => 'Business-focused dynamic time-frame',
                'content' => 'Vivamus tortor. Duis mattis egestas metus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-04-26', // CORRECTED FORMAT
            ],
            [
                'id' => 48,
                'title' => 'Enhanced zero administration functionalities',
                'content' => 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-05-24', // CORRECTED FORMAT
            ],
            [
                'id' => 49,
                'title' => 'Persevering national infrastructure',
                'content' => 'Etiam faucibus cursus urna. Ut tellus.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-04-08', // CORRECTED FORMAT
            ],
            [
                'id' => 50,
                'title' => 'Multi-layered intermediate definition',
                'content' => 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-04-02', // CORRECTED FORMAT
            ],
            [
                'id' => 51,
                'title' => 'Inverse national alliance',
                'content' => 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-02-14', // CORRECTED FORMAT
            ],
            [
                'id' => 52,
                'title' => 'Ameliorated modular initiative',
                'content' => 'Donec posuere metus vitae ipsum.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-10-03', // CORRECTED FORMAT
            ],
            [
                'id' => 53,
                'title' => 'Object-based encompassing time-frame',
                'content' => 'Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-06-10', // CORRECTED FORMAT
            ],
            [
                'id' => 54,
                'title' => 'Face to face homogeneous approach',
                'content' => 'Nulla nisl. Nunc nisl.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-08-27', // CORRECTED FORMAT
            ],
            [
                'id' => 55,
                'title' => 'Sharable value-added application',
                'content' => 'Morbi quis tortor id nulla ultrices aliquet.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-07-22', // CORRECTED FORMAT
            ],
            [
                'id' => 56,
                'title' => 'Virtual optimizing hierarchy',
                'content' => 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-06-23', // CORRECTED FORMAT
            ],
            [
                'id' => 57,
                'title' => 'Down-sized cohesive encoding',
                'content' => 'Donec posuere metus vitae ipsum. Aliquam non mauris.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-11', // CORRECTED FORMAT
            ],
            [
                'id' => 58,
                'title' => 'Mandatory 24/7 utilisation',
                'content' => 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-22', // CORRECTED FORMAT
            ],
            [
                'id' => 59,
                'title' => 'Diverse optimal installation',
                'content' => 'Morbi vel lectus in quam fringilla rhoncus.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-02-28', // CORRECTED FORMAT
            ],
            [
                'id' => 60,
                'title' => 'Networked solution-oriented superstructure',
                'content' => 'Donec ut dolor.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-01', // CORRECTED FORMAT
            ],
            [
                'id' => 61,
                'title' => 'Customizable object-oriented intranet',
                'content' => 'Nullam molestie nibh in lectus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-01-09', // CORRECTED FORMAT
            ],
            [
                'id' => 62,
                'title' => 'Enhanced composite standardization',
                'content' => 'Etiam justo. Etiam pretium iaculis justo.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-05-12', // CORRECTED FORMAT
            ],
            [
                'id' => 63,
                'title' => 'Fully-configurable value-added data-warehouse',
                'content' => 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-07-02', // CORRECTED FORMAT
            ],
            [
                'id' => 64,
                'title' => 'Programmable fresh-thinking synergy',
                'content' => 'Sed accumsan felis. Ut at dolor quis odio consequat varius.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-09-30', // CORRECTED FORMAT
            ],
            [
                'id' => 65,
                'title' => 'Compatible object-oriented initiative',
                'content' => 'In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-12-28', // CORRECTED FORMAT
            ],
            [
                'id' => 66,
                'title' => 'Synergized intangible system engine',
                'content' => 'Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-01', // CORRECTED FORMAT
            ],
            [
                'id' => 67,
                'title' => 'Re-contextualized multimedia contingency',
                'content' => 'Maecenas ut massa quis augue luctus tincidunt.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-05-21', // CORRECTED FORMAT
            ],
            [
                'id' => 68,
                'title' => 'Realigned transitional website',
                'content' => 'Proin at turpis a pede posuere nonummy.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-02-13', // CORRECTED FORMAT
            ],
            [
                'id' => 69,
                'title' => 'Reduced high-level product',
                'content' => 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-09-27', // CORRECTED FORMAT
            ],
            [
                'id' => 70,
                'title' => 'Function-based system-worthy hierarchy',
                'content' => 'Sed vel enim sit amet nunc viverra dapibus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-01-01', // CORRECTED FORMAT
            ],
            [
                'id' => 71,
                'title' => 'Switchable full-range strategy',
                'content' => 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-22', // CORRECTED FORMAT
            ],
            [
                'id' => 72,
                'title' => 'Networked zero administration function',
                'content' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-08-28', // CORRECTED FORMAT
            ],
            [
                'id' => 73,
                'title' => 'Team-oriented demand-driven throughput',
                'content' => 'Curabitur gravida nisi at nibh.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-03-08', // CORRECTED FORMAT
            ],
            [
                'id' => 74,
                'title' => 'Public-key real-time leverage',
                'content' => 'Integer ac leo.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-08-17', // CORRECTED FORMAT
            ],
            [
                'id' => 75,
                'title' => 'Re-engineered user-facing capability',
                'content' => 'Curabitur in libero ut massa volutpat convallis.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-04', // CORRECTED FORMAT
            ],
            [
                'id' => 76,
                'title' => 'Extended zero administration customer loyalty',
                'content' => 'Duis mattis egestas metus. Aenean fermentum.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-03-03', // CORRECTED FORMAT
            ],
            [
                'id' => 77,
                'title' => 'Upgradable content-based structure',
                'content' => 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-25', // CORRECTED FORMAT
            ],
            [
                'id' => 78,
                'title' => 'Seamless full-range function',
                'content' => 'In hac habitasse platea dictumst. Etiam faucibus cursus urna.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-02-25', // CORRECTED FORMAT
            ],
            [
                'id' => 79,
                'title' => 'Advanced upward-trending framework',
                'content' => 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-11-17', // CORRECTED FORMAT
            ],
            [
                'id' => 80,
                'title' => 'Innovative systematic strategy',
                'content' => 'Praesent blandit. Nam nulla.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2024-12-23', // CORRECTED FORMAT
            ],
            [
                'id' => 81,
                'title' => 'Cross-group value-added circuit',
                'content' => 'Nullam molestie nibh in lectus. Pellentesque at nulla.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-03-03', // CORRECTED FORMAT
            ],
            [
                'id' => 82,
                'title' => 'Cross-group hybrid projection',
                'content' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-02', // CORRECTED FORMAT
            ],
            [
                'id' => 83,
                'title' => 'Innovative explicit info-mediaries',
                'content' => 'Donec dapibus.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-06-04', // CORRECTED FORMAT
            ],
            [
                'id' => 84,
                'title' => 'Progressive mobile standardization',
                'content' => 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-09-10', // CORRECTED FORMAT
            ],
            [
                'id' => 85,
                'title' => 'Phased executive migration',
                'content' => 'Vivamus tortor.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-10-30', // CORRECTED FORMAT
            ],
            [
                'id' => 86,
                'title' => 'Virtual transitional project',
                'content' => 'Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-07-22', // CORRECTED FORMAT
            ],
            [
                'id' => 87,
                'title' => 'Multi-lateral even-keeled conglomeration',
                'content' => 'Morbi ut odio.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-07-15', // CORRECTED FORMAT
            ],
            [
                'id' => 88,
                'title' => 'De-engineered impactful migration',
                'content' => 'Vivamus tortor. Duis mattis egestas metus.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-09-23', // CORRECTED FORMAT
            ],
            [
                'id' => 89,
                'title' => 'Persistent regional help-desk',
                'content' => 'Proin eu mi. Nulla ac enim.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-10-12', // CORRECTED FORMAT
            ],
            [
                'id' => 90,
                'title' => 'Virtual multi-state attitude',
                'content' => 'Phasellus sit amet erat. Nulla tempus.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-09', // CORRECTED FORMAT
            ],
            [
                'id' => 91,
                'title' => 'Front-line neutral leverage',
                'content' => 'Phasellus in felis.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-04-30', // CORRECTED FORMAT
            ],
            [
                'id' => 92,
                'title' => 'Inverse attitude-oriented projection',
                'content' => 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-09-22', // CORRECTED FORMAT
            ],
            [
                'id' => 93,
                'title' => 'Enterprise-wide global middleware',
                'content' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-10-01', // CORRECTED FORMAT
            ],
            [
                'id' => 94,
                'title' => 'Synergistic multimedia help-desk',
                'content' => 'Duis bibendum. Morbi non quam nec dui luctus rutrum.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-09-22', // CORRECTED FORMAT
            ],
            [
                'id' => 95,
                'title' => 'Monitored bottom-line firmware',
                'content' => 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-08-25', // CORRECTED FORMAT
            ],
            [
                'id' => 96,
                'title' => 'Public-key optimizing encoding',
                'content' => 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-08-31', // CORRECTED FORMAT
            ],
            [
                'id' => 97,
                'title' => 'Re-contextualized fault-tolerant capability',
                'content' => 'In est risus, auctor sed, tristique in, tempus sit amet, sem.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-01-28', // CORRECTED FORMAT
            ],
            [
                'id' => 98,
                'title' => 'Focused hybrid support',
                'content' => 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2025-07-20', // CORRECTED FORMAT
            ],
            [
                'id' => 99,
                'title' => 'Object-based background structure',
                'content' => 'Quisque porta volutpat erat.',
                'status' => 'approved',
                'user_id' => 1,
                'created_at' => '2024-12-10', // CORRECTED FORMAT
            ],
            [
                'id' => 100,
                'title' => 'Organized radical service-desk',
                'content' => 'Vestibulum sed magna at nunc commodo placerat.',
                'status' => 'approved',
                'user_id' => 2,
                'created_at' => '2025-07-16', // CORRECTED FORMAT
            ],
        ];

        DB::table('reviews')->insert($reviews);
    }
}
