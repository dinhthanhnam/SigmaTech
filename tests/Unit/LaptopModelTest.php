<?php

namespace Tests\Unit;

use App\Models\Laptop;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaptopModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_mass_assignable_attributes()
    {
        // Tạo dữ liệu Laptop trực tiếp
        $laptop = new Laptop([
            'name' => 'Asus ROG',
            'category_id' => 1
        ]);
        $laptop->save();

        // Kiểm tra Laptop được tạo thành công
        $this->assertInstanceOf(Laptop::class, $laptop);
        $this->assertEquals('Asus ROG', $laptop->name);
        $this->assertEquals(1, $laptop->category_id);
    }

    /** @test */
    public function it_has_a_belongs_to_many_relationship_with_attributes()
    {
        // Tạo dữ liệu Laptop và Attribute
        $laptop = Laptop::create(['name' => 'Dell Gaming', 'category_id' => 1]);

        $attribute1 = Attribute::create(['name' => 'Brand']);
        $attribute2 = Attribute::create(['name' => 'Price']);

        // Gắn thuộc tính thông qua bảng trung gian
        $laptop->attributes()->attach($attribute1->id, ['value' => 'Dell']);
        $laptop->attributes()->attach($attribute2->id, ['value' => '50000']);

        // Kiểm tra quan hệ
        $this->assertCount(2, $laptop->attributes);
        $this->assertEquals('Dell', $laptop->attributes()->where('name', 'Brand')->first()->pivot->value);
        $this->assertEquals('50000', $laptop->attributes()->where('name', 'Price')->first()->pivot->value);
    }

    /** @test */
    public function it_has_a_belongs_to_relationship_with_category()
    {
        // Tạo dữ liệu Category và Laptop
        $category = Category::create(['name' => 'Gaming']);
        $laptop = Laptop::create([
            'name' => 'MSI Stealth',
            'category_id' => $category->id
        ]);

        // Kiểm tra quan hệ
        $this->assertTrue($laptop->categories()->exists());
        $this->assertEquals('Gaming', $laptop->categories->name);
    }
}
