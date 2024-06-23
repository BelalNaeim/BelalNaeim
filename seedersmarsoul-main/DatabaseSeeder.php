<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(SiteSettingSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(BankSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(IntrosTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(StoreMenuCategoriesSeeder::class);
        $this->call(FeaturesSeeder::class);
        $this->call(ProperitiesSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductfeaturesSeeder::class);
        $this->call(ProductfeatureproperitiesSeeder::class);
        $this->call(ProductgroupsSeeder::class);
        $this->call(ProductAdditiveCategorySeeder::class);
        $this->call(ProductAdditiveSeeder::class);
        $this->call(PaymentmethodsTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(CartypesTableSeeder::class);
        $this->call(ReasonsTableSeeder::class);
        $this->call(HyperpayBrandsTableSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(DelegateJoinRequests::class);
        $this->call(ComplainSeeder::class);
        $this->call(FqsTableSeeder::class);
        $this->call(SmsTableSeeder::class);
        $this->call(OrderTableSeeder::class);
    }
}
