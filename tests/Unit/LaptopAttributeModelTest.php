<?php

namespace Tests\Unit;

use App\Models\Laptop;
use App\Models\Attribute;
use App\Models\LaptopAttribute;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaptopAttributeModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_mass_assignable_attributes()
    {
        // Tạo một LaptopAttribute bằng cách gán giá trị trực tiếp
        $laptopAttribute = LaptopAttribute::create([
            'laptop_id' => 1,
            'attribute_id' => 2,
            'value' => 'Gaming'
        ]);

        // Kiểm tra LaptopAttribute được tạo thành công
        $this->assertInstanceOf(LaptopAttribute::class, $laptopAttribute);
        $this->assertEquals(1, $laptopAttribute->laptop_id);
        $this->assertEquals(2, $laptopAttribute->attribute_id);
        $this->assertEquals('Gaming', $laptopAttribute->value);
    }

    /** @test */
    public function it_belongs_to_a_laptop()
    {
        // Tạo dữ liệu Laptop và LaptopAttribute
        $laptop = Laptop::create(['name' => 'Asus ROG', 'category_id' => 1]);
        $laptopAttribute = LaptopAttribute::create([
            'laptop_id' => $laptop->id,
            'attribute_id' => 1,
            'value' => 'Gaming'
        ]);

        // Kiểm tra quan hệ với Laptop
        $this->assertInstanceOf(Laptop::class, $laptopAttribute->laptop);
        $this->assertEquals('Asus ROG', $laptopAttribute->laptop->name);
    }

    /** @test */
    public function it_belongs_to_an_attribute()
    {
        // Tạo dữ liệu Attribute và LaptopAttribute
        $attribute = Attribute::create(['name' => 'Brand']);
        $laptopAttribute = LaptopAttribute::create([
            'laptop_id' => 1,
            'attribute_id' => $attribute->id,
            'value' => 'Dell'
        ]);

        // Kiểm tra quan hệ với Attribute
        $this->assertInstanceOf(Attribute::class, $laptopAttribute->attribute);
        $this->assertEquals('Brand', $laptopAttribute->attribute->name);
    }
}
