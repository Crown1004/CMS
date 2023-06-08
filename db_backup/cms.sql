-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2023 at 12:54 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `alert` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `user_id`, `alert`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2023-04-28 09:44:19', '2023-06-06 12:32:37'),
(2, 2, 0, '2023-04-28 09:44:19', '2023-06-06 12:30:40'),
(3, 3, 1, '2023-04-28 09:44:19', '2023-05-01 06:34:23'),
(4, 6, 0, '2023-05-01 08:57:01', '2023-05-01 08:57:01'),
(5, 7, 0, '2023-05-01 08:57:54', '2023-05-01 08:57:54'),
(6, 8, 0, '2023-05-01 09:00:48', '2023-05-01 09:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'سياسة', 'سياسة', '2023-04-28 09:44:19', NULL),
(2, 'ثقافة', 'ثقافة', '2023-04-28 09:44:19', NULL),
(3, 'اقتصاد', 'اقتصاد', '2023-04-28 09:44:19', NULL),
(4, 'فن', 'فن', '2023-04-28 09:44:19', NULL),
(5, 'تعليم', 'تعليم', '2023-04-28 09:44:19', NULL),
(6, 'تكنولوجيا', 'تكنولوجيا', '2023-04-28 09:44:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `commentable_id` int UNSIGNED DEFAULT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `post_id`, `user_id`, `parent_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 'شكرًا جزيلًا', 1, 2, NULL, 1, 'App\\Models\\Post', '2022-05-10 08:44:00', NULL),
(2, 'مقال مفيد', 1, 3, NULL, 1, 'App\\Models\\Post', '2022-04-22 09:44:00', NULL),
(3, 'جزاكم الله خيراً', 2, 2, NULL, 2, 'App\\Models\\Post', '2022-03-22 09:44:00', NULL),
(4, 'acscavaavs', 1, 1, NULL, 1, 'App\\Models\\Post', '2023-05-01 06:34:21', '2023-05-01 06:34:21'),
(5, 'شكراً جزيلاً', 3, 1, NULL, 3, 'App\\Models\\Post', '2023-06-06 12:24:08', '2023-06-06 12:24:08'),
(6, 'test notifications', 4, 1, NULL, 4, 'App\\Models\\Post', '2023-06-06 12:30:31', '2023-06-06 12:30:31'),
(7, 'test', 3, 2, NULL, 3, 'App\\Models\\Post', '2023-06-06 12:32:30', '2023-06-06 12:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_03_19_082508_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_03_18_075700_create_sessions_table', 1),
(8, '2023_03_19_082448_create_categories_table', 1),
(9, '2023_03_19_082501_create_posts_table', 1),
(10, '2023_03_19_082515_create_comments_table', 1),
(11, '2023_03_19_082523_create_pages_table', 1),
(12, '2023_03_19_082653_create_permissions_table', 1),
(13, '2023_03_19_082710_create_notifications_table', 1),
(14, '2023_03_19_082723_create_alerts_table', 1),
(15, '2023_03_19_090403_create_permission_rule_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `post_userId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `post_id`, `post_userId`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '1', '2022-05-05 02:08:00', NULL),
(2, 2, 3, '1', '2022-05-05 03:08:00', NULL),
(3, 3, 4, '2', '2022-05-05 04:08:00', NULL),
(4, 1, 1, '3', '2023-05-01 06:34:21', '2023-05-01 06:34:21'),
(5, 1, 4, '2', '2023-06-06 12:30:31', '2023-06-06 12:30:31'),
(6, 2, 3, '1', '2023-06-06 12:32:30', '2023-06-06 12:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `content`, `created_at`, `updated_at`) VALUES
(7, 'About', 'نبذة عنا', '<p>أهلا بك في موقعي المتواضع تستطيع من خلال هذا الموقع :</p><p>1. &nbsp; إضافة منشورات و التحكم بها</p><p>2. إضافة تعليقات علي منشورات الآخرين</p><p>3. والمزيد من الميزات الآخري</p>', '2023-04-30 09:56:28', '2023-04-30 09:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'add-post', 'إضافة المواضيع', NULL, NULL),
(2, 'edit-post', 'تعديل المواضيع', NULL, NULL),
(3, 'delete-post', 'حذف المواضيع', NULL, NULL),
(4, 'add-user', 'إضافة المستخدمين', NULL, NULL),
(5, 'edit-user', 'تعديل بيانات المستخدمين', NULL, NULL),
(6, 'delete-user', 'حذف المستخدمين', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(7, 2, 1, NULL, NULL),
(11, 1, 2, NULL, NULL),
(13, 1, 3, NULL, NULL),
(20, 1, 4, NULL, NULL),
(21, 1, 5, NULL, NULL),
(22, 1, 6, NULL, NULL),
(23, 2, 2, NULL, NULL),
(24, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `image_path`, `approved`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'لماذا يقوم السياسيون بهذه الحركة الغريبة؟', 'لماذا-يقوم-السياسيون-بهذه-الحركة-الغريبة', '<p>السياسة بحر واسع، وقد لا نحبُّ الدخول فيها والخوض في أحاديثها، لكنّنا نستطيع الاستفادة ممّا يفعل السياسيون في بعض النواحي، خصوصًا في لغة الجسد والاشارات، فعندنا ما يكفي من المعلومات لتُخبرنا أنَّهم يتعاونون مع خُبراء في علم النفس ولغة الجسد لإحكام تأثيرهم في الناس، فلماذا لا نستفيد مجانا ممّا يصرفون؟\n            أحد هذه الطرق هي حركة تُستخدم في الخطابات، قبضة مرتخية يعلوُ فيها الابهام على السبابة، كما لو كُنت تُقدِّم نقودًا إلى المقابل، والصورة تشرح أكثر.\n            يقول العميل السابق في الـ FBI وخبير لغة الجسد جو نافارو أنَّ هذه الحركة أصبحت شائعة في الحملات الانتخابية وخطباء الرؤساء، وتُستخدم غالبًا عندما يُريدون ايصال نقطة معيّنة ويؤكدّون عليها.\n            الاشارة تُوحي كما لو أنَّك تؤكِّد على نقطة، خصوصًا وأنّنا نستخدم حركات مُشابهة في مسك القلم أو الأكل أو الرسم، وهذه كلّها حركات فيها قدر كبير من التصميم.\n            هناك حركة مُشابهة المعنى يستخدمها دونالد ترامب، وهي أكثر شيوعًا لدى رؤساء العالم خارج أمريكًا، وهي كما لو أنَّك تُشير بإشارة OK بأحدى يديك أو كلتيهما.\n            </p>', 'politica.png', 1, 3, 1, '2022-05-05 02:08:00', NULL),
(2, 'أسعار الفائدة وآثارها على الاقتصاد', 'أسعار-الفائدة-وآثارها-على-الاقتصاد', '<p>يموج عالم اليوم بالعديد من المتغيرات المختلفة التي تؤثر على كافة المؤشرات الاقتصادية صعوداً وهبوطاً، ولعل أهم تلك الأبعاد التي تؤثر بشكل كبير على كافة المحاور الاقتصادية هي أسعار الفائدة.\n            ونعني بأسعار الفائدة حجم الأموال التي يحصل عليها المودعون نتيجة إيداعهم لمبلغ من المال خلال مدة زمنية محددة، وقد تكون أسعار الفائدة ثابتة وأحياناً متغيرة.\n            كما يقصد بها أيضاً مقدار ما يدفعه المقترضون لقاء حصولهم على مبالغ معينة تسمى القروض من المؤسسات المالية كالبنوك وغيرها.\n            إذاً فأسعار الفائدة حق للمودع يحصل عليه نظير وديعته في بنك معين؛ ودين على المقترض الذي يقوم بدوره بتسديد تلك الفوائد نتيجة حصوله على قرض من أحد البنوك.\n            على سبيل المثال لو أن أسعار الفائدة على الودائع في بنك معين 15%، وسعر الفائدة على القروض الممنوحة للعملاء 17%، فيكون هناك فائض 2% للبنك، وتعتبر هذه النسبة مصدر أساسي من مصادر دخل البنك ومصدراً مهماً للأرباح\n            هذه كانت نبذة عن مفهوم أسعار الفائدة، تبقى لنا أن نتحدث عن تأثيرات أسعار الفائدة على العديد من المؤشرات الاقتصادية، ولعل أهمها:\n            البطالة: توجد علاقة وطيدة بين أسعار الفائدة وبين نسب البطالة في المجتمع، فعندما ترتفع أسعار الفائدة تزيد تكلفة الإنتاج والمواد الخام وبناءً عليه تزيد أسعار المنتجات، والذي بدوره ينعكس مباشرة على انخفاض الطلب والمبيعات للمنتجات، وهذا الأمر بدوره يؤدي إلى خسائر كبيرة للشركات، تجبر الشركات على تصفية العمالة الموجودة داخل الشركة لتقليل التكاليف وتعويض الخسائر، ويؤدي ذلك إلى ارتفاع معدلات البطالة، والعكس صحيح تماماً فانخفاض أسعار الفائدة يؤدي إلى إنخفاض معدلات البطالة.\n            أسواق الأسهم والسندات: دائماً ما يبحث المستثمر عن أفضل مكان يمنحه أسعاراً عالية للفائدة، فعندما تزيد أسعار الفائدة في البنوك يقل حجم الاستثمار في الأسهم، ويحدث ذلك لأن أسعار الفائدة عندما تزيد تؤدي إلى زيادة تكاليف الإنتاج وانخفاض معدلات الأرباح للشركات بطريقة تجعل تلك الشركات تخفض من معدلات صرفها للأرباح لأسهمها، والعكس صحيح تماماً، فإن انخفاض أسعار الفائدة في البنوك يؤدي إلى زيادة ربحية الشركات، وزيادة فوائد أسهمها بطريقة تجعل المستثمرون يتوجهون لشراء أسهم الشركات بدلاً من إيداع الأموال في البنوك.\n            التضخم: يعني التضخم مجموعة من المشاكل التي تؤدي في النهاية إلى ظاهرة ارتفاع الأسعار، ويحدث التضخم بسبب زيادة حجم النقود في المجتمع عن إجمالي قيمة السلع والخدمات المقدمة في هذا المجتمع، وللقضاء على آفة التضخم يقوم البنك المركزي برفع معدلات الفائدة لتقليل حجم النقد المتداول في المجتمع وبناءً عليه يحدث انخفاض في الطلب على المنتجات والخدمات وتنخفض الأسعار.\n            هذه كانت أهم المؤشرات الاقتصادية التي تتأثر بأسعار الفائدة التي يفرضها البنك المركزي لكل دولة.</p>', NULL, 1, 1, 3, '2022-01-04 03:08:00', NULL),
(3, 'ثقافة الاستنقاص من الأعمال المطبخية', 'ثقافة-الاستنقاص-من-الأعمال-المطبخية', '<p>بمناسبة شهر رمضان الكريم تذكرت مثلكم جميعا الأكل! فكما تعلمون نحن نصوم عن الأكل بالدرجة الأولى.\n            رغم أن تناول الطعام من أولوياتنا قبل أي نشاط آخر نمارسه بالكون إلا أن لدينا ثقافة استنقاص من أعمال تحضير هذه الأولوية المقدسة, ففي جل الثقافات حول العالم يتم إقران المطبخ بالمرأة بشكل استنقاصي, فإذا استشاط أحدهم غضبا من نقاش فلسفي دائر بينه وبين امرأة ما يردد عبارات من قبيل: عودي للمطبخ!, مكان المرأة المطبخ!, في حين أن المطبخ هو الذي يبقيه على قيد الحياة وليس فلسفاته ونقاشاته المستعرة حامية الوطيس. وعلى الطرف المقابل أولائك الذين يحاولون الإعلاء من شأن أمور المطبخ بشكل متكلف مصطنع ومنفّر (منفر لي على الأقل), فإن دل تكلّفهم على شيء فعلى مكبوتاتهم المحتقرة للعمل, فيمدح البعض المرأة بالمطبخ ويصورها في قالب شعري رومانسي على أنها تنجز أعظم الأعمال, وبحاجة لباقة ورد وقبلة على اليد, أحيانا يضيف بعض البهارات الدينية لعباراته الرنانة...في حين لن يرغب أي من هؤلاء المتكلفين المتصنعين نيل شرف إنجاز هذا العمل العظيم كما يصفونه على مواقع التواصل الاجتماعي.\n            عندما يبدأ الشخص بالمبالغة في مدح بعض الأعمال على غير حقيقتها فاعلم أنه يحتقرها بدواخله! هذا على حد علمي والله أعلم!\n            وليس موضوعي هنا المرأة بل المطبخ... لنركز! فحتى عدد من النساء يحتقرن أعمال تحضير الطعام وتربط بعض الحقوقيات تقدم المرأة بالتمرد على المطابخ وهدم صوامعها.\n            ما الفكرة؟\n            الفكرة التي أرغب في إيصالها هي أننا بحاجة لإعادة النظر في بعض القيم بمجتمعنا, إن عملية تحضير ما نأكله كبشر بديهة من البديهيات التي بالأحرى يجب أن يتقن أساسياتها الجميع, ولا أقصد هنا إتقان تحضير الأطباق الشعبية بل على الأقل تلك المعرفة الأولية الأساسية التي تبقينا على قيد الحياة, أن يتولى طرف ما من الأسرة مهمة تحضير الطعام للجميع هي مسألة من المفترض أن لا تأخذ هذا الحيز الكبير من نقاشاتنا المجتمعية, ولا أن يكون لها ذاك الوقع الهدام لحياة من يتولون المهمة, فيُحشرون اليوم كله بالمطبخ.</p>', NULL, 1, 1, 2, '2022-04-07 03:08:00', NULL),
(4, 'كيف تؤثر الثقافة على الإعلانات؟', 'كيف-تؤثر-الثقافة-على-الإعلانات', '<p>تتـأثر الطريقة التي نتصرف بها كأفراد بسياقنا الثقافي، وقد تحدثت الدراسات الثقافية عن هذا الأمر منذ سبعينيات القرن الماضي. حيث أوضحت هذه الدراسات أنّ الثقافة هي برمجة ذهنية جماعية للعقل البشري، تميز مجموعة من الناس عن المجموعات الأخرى، وتؤثر على أنماط تفكير أفراد هذه الجماعات وطريقة تصرفهم واتخاذهم للقرارات.\n            تعي الشركات جيدا هذا الاختلاف بين ثقافات المجتمعات المستهدفة وحتى بين الجماعات الصغيرة التي تشكل هذه المجتمعات، ولهذا تحاول زيادة الوعي بين أفراد فرق التسويق والمبيعات بخصوص هذا الاختلاف، كما تسعى لفهم الأبعاد الأساسية للثقافة المحلية التي تستهدفها من أجل التواصل بشكل أفضل مع العملاء. لأنّه وكما هو معلوم فإنّ تقديم رسائل إعلانية أكثر تناسبا مع ثقافة المجتمع المستهدف يعني تحقيق إقناع وتأثير أكبر عند العملاء المستهدفين، وعلى العكس منه تجاهل الثقافات المحلية للعملاء المحتملين يعني فشل الحملات الإعلانية في تحقيق هدفها.\n            وحتى تكون الصورة أوضح، سأشارك معكم هذا المثال\n            يتم التركيز في الإعلانات في بريطانيا على العاطفة وعلى إظهار الكيفية التي سيساعد بها المنتج على تغيير حياة العميل، وهو عكس ما يتم العمل به في ألمانيا، حيث يفضل العملاء الألمان الأساليب الأكثر عقلانية، والتي تتضمن تقديم معلومات أكبر حول طريقة عمل المنتج وثمنه وضماناته وإمكانية ربطه بمنتجات أخرى.\n            وكمثال واقعي على هذا الفرق، عندما عرضت سلسلة المتاجر الألمانية الشهيرة Lido إعلاناتها الموجهة للسوق الألماني في بريطانيا فشلت في جذب المستهلكين البريطانيين، ما اضطرها إلى تغيير الإعلانات الأولى وتعويضها بإعلانات جديدة تركز بشكل أكبر على التصورات الإضافية التي يمكن للمنتجات تقديمها بدل التركيز على السعر والقيمة كما كان معمول به في الإعلان الألماني، وبعد هذا التغيير حققت Lido نتائج مذهلة.</p>', NULL, 1, 2, 2, '2022-02-06 03:08:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'مدير', NULL, NULL),
(2, 'مستخدم جديد', NULL, NULL),
(3, 'مستخدم فعال', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9gFm9bLNf4aeNbpFUumkQLmJlK5SzGLLaS0V4S32', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ0RCTGNoNG80ZG90NzVpY0E5OWRMeG9maHdPVFRlaFZmczBYaFNVTSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQyOiJodHRwOi8vY29udGVudC1tYW5hZ2VtZW50LXN5c3RlbS5sb2NhbGhvc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1686065485),
('BaOjyrONQ6OoeW8npajxmSd20PeKmqWUdYPusSar', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUGt1SVZXWVpQa0M0T0lxZEpqRjYwclVSd2p2Z0w3NTRQb2M5YUp5ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly9jb250ZW50LW1hbmFnZW1lbnQtc3lzdGVtLmxvY2FsaG9zdC9hZG1pbi9wYWdlL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkajllY0cuWjFhQ1RwTmZsa3Ywc29FLlVrWldYVTh4b1psU2E4YmcvSUd0N1NPM2Vlb0s2cTYiO30=', 1686066018),
('OPriMvRWKxf2AicbaSMkzllVsp0Qejm4AsXyKdm5', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.57', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1N4Y1pUWFk3T1lkc2NFaUlCQlhKVkxYbFU2a01WWTZVNjZtU1BtRSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIzODoiaHR0cDovL2NvbnRlbnQtbWFuYWdlbWVudC1zeXN0ZW0ubG9jYWxob3N0L3Bvc3QvJUQ4JUFCJUQ5JTgyJUQ4JUE3JUQ5JTgxJUQ4JUE5LSVEOCVBNyVEOSU4NCVEOCVBNyVEOCVCMyVEOCVBQSVEOSU4NiVEOSU4MiVEOCVBNyVEOCVCNS0lRDklODUlRDklODYtJUQ4JUE3JUQ5JTg0JUQ4JUEzJUQ4JUI5JUQ5JTg1JUQ4JUE3JUQ5JTg0LSVEOCVBNyVEOSU4NCVEOSU4NSVEOCVCNyVEOCVBOCVEOCVBRSVEOSU4QSVEOCVBOSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1686065569);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'ahmed gamal', 'ahmed@gmail.com', '2023-04-28 09:44:19', '$2y$10$j9ecG.Z1aCTpNflkv0soE.UkZWXU8xoZlSa8bg/IGt7SO3eeoK6q6', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-01 03:32:11'),
(2, 'mohammed gamal', 'mohammed@gmail.com', '2023-04-28 09:44:19', '$2y$10$7uqwcWClZMz.A0szWtUFOOh.y/eP.apQzyU3jd4EnmCpnw19qW//6', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(3, 'emad gamal', 'emad@gmail.com', '2023-04-28 09:44:19', '$2y$10$hg5IWxqAMp7HU5shBbgCTON09d9a4ZWtBperr.Zn1iT9FbxCOlQ7.', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
(8, 'test', 'test@gmail.com', NULL, '$2y$10$uLx7Nj41wxIKchUn/hcR3.0s65IFeNRa5vihZ7BpGNHqHl5c7eh/C', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-05-01 09:00:48', '2023-05-01 09:00:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_post_id_foreign` (`post_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_slug_index` (`slug`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
