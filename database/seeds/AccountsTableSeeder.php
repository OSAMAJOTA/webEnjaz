<?php




use Illuminate\Database\Seeder;
use App\Account;

class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        // الأصول
        $assets = Account::create(['name' => 'الأصول', 'type' => 'asset']);
        $currentAssets = Account::create(['name' => 'الأصول الجارية', 'type' => 'asset', 'parent_id' => $assets->id]);
        $cash = Account::create(['name' => 'النقدية', 'type' => 'asset', 'parent_id' => $currentAssets->id]);
        Account::create(['name' => 'النقدية في الصندوق', 'type' => 'asset', 'parent_id' => $cash->id]);
        Account::create(['name' => 'النقدية في البنك', 'type' => 'asset', 'parent_id' => $cash->id]);
        Account::create(['name' => 'المدينون', 'type' => 'asset', 'parent_id' => $currentAssets->id]);
        Account::create(['name' => 'المصروفات المدفوعة مقدمًا', 'type' => 'asset', 'parent_id' => $currentAssets->id]);

        // الأصول الثابتة
        $fixedAssets = Account::create(['name' => 'الأصول الثابتة', 'type' => 'asset', 'parent_id' => $assets->id]);
        Account::create(['name' => 'الأثاث والتجهيزات', 'type' => 'asset', 'parent_id' => $fixedAssets->id]);
        Account::create(['name' => 'المعدات', 'type' => 'asset', 'parent_id' => $fixedAssets->id]);
        Account::create(['name' => 'المركبات', 'type' => 'asset', 'parent_id' => $fixedAssets->id]);

        // الخصوم
        $liabilities = Account::create(['name' => 'الخصوم', 'type' => 'liability']);
        $currentLiabilities = Account::create(['name' => 'الخصوم الجارية', 'type' => 'liability', 'parent_id' => $liabilities->id]);
        Account::create(['name' => 'الدائنون', 'type' => 'liability', 'parent_id' => $currentLiabilities->id]);
        Account::create(['name' => 'المصروفات المستحقة', 'type' => 'liability', 'parent_id' => $currentLiabilities->id]);
        Account::create(['name' => 'القروض قصيرة الأجل', 'type' => 'liability', 'parent_id' => $currentLiabilities->id]);

        $longTermLiabilities = Account::create(['name' => 'الخصوم طويلة الأجل', 'type' => 'liability', 'parent_id' => $liabilities->id]);
        Account::create(['name' => 'القروض طويلة الأجل', 'type' => 'liability', 'parent_id' => $longTermLiabilities->id]);

        // حقوق الملكية
        $equity = Account::create(['name' => 'حقوق الملكية', 'type' => 'equity']);
        Account::create(['name' => 'رأس المال', 'type' => 'equity', 'parent_id' => $equity->id]);
        Account::create(['name' => 'الأرباح المحتجزة', 'type' => 'equity', 'parent_id' => $equity->id]);

        // الإيرادات
        $revenues = Account::create(['name' => 'الإيرادات', 'type' => 'revenue']);
        Account::create(['name' => 'إيرادات الاستقدام', 'type' => 'revenue', 'parent_id' => $revenues->id]);
        Account::create(['name' => 'إيرادات التأجير', 'type' => 'revenue', 'parent_id' => $revenues->id]);

        // المصروفات
        $expenses = Account::create(['name' => 'المصروفات', 'type' => 'expense']);
        $operatingExpenses = Account::create(['name' => 'المصروفات التشغيلية', 'type' => 'expense', 'parent_id' => $expenses->id]);
        Account::create(['name' => 'الرواتب والأجور', 'type' => 'expense', 'parent_id' => $operatingExpenses->id]);
        Account::create(['name' => 'إيجار المكتب', 'type' => 'expense', 'parent_id' => $operatingExpenses->id]);
        Account::create(['name' => 'المرافق', 'type' => 'expense', 'parent_id' => $operatingExpenses->id]);
        Account::create(['name' => 'مصروفات التسويق', 'type' => 'expense', 'parent_id' => $operatingExpenses->id]);
        Account::create(['name' => 'مصروفات السفر', 'type' => 'expense', 'parent_id' => $operatingExpenses->id]);
        Account::create(['name' => 'مصروفات المواصلات', 'type' => 'expense', 'parent_id' => $operatingExpenses->id]);

        $administrativeExpenses = Account::create(['name' => 'المصروفات الإدارية', 'type' => 'expense', 'parent_id' => $expenses->id]);
        Account::create(['name' => 'المستلزمات المكتبية', 'type' => 'expense', 'parent_id' => $administrativeExpenses->id]);
        Account::create(['name' => 'المصروفات القانونية', 'type' => 'expense', 'parent_id' => $administrativeExpenses->id]);
        Account::create(['name' => 'التأمين', 'type' => 'expense', 'parent_id' => $administrativeExpenses->id]);
    }
}
