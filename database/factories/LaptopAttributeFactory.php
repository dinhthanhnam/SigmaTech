<?php

namespace Database\Factories;

use App\Models\LaptopAttribute;
use App\Models\Laptop;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
//chưa sử dụng đến, không ai dùng có thể xóa
class LaptopAttributeFactory extends Factory
{
    protected $model = LaptopAttribute::class;

    public function definition(): array
    {
        // Lấy ngẫu nhiên Laptop và Attribute từ cơ sở dữ liệu
        $laptopId = Laptop::factory()->create()->id; // Tạo laptop giả và lấy id
        $attributeId = $this->faker->randomElement([
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 
            11, 12, 13, 14, 15, 16, 17, 18, 
            19, 20, 21, 22, 23, 24, 25, 26, 
            27, 28, 29, 30, 31, 32, 33, 34, 
            35, 36, 37, 38, 39, 40, 41, 42
        ]);

        $value = $this->generateAttributeValue($attributeId);

        return [
            'laptop_id' => $laptopId,
            'attribute_id' => $attributeId,
            'value' => $value,
        ];
    }

    /**
     * Hàm để tạo giá trị cho từng attributeId
     * 
     * @param int $attributeId
     * @return mixed
     */
    public function generateAttributeValue($attributeId)
    {
        switch ($attributeId) {
            case 1: // Brand
                return $this->faker->company;
            case 2: // Model
                return $this->faker->word;
            case 3: // Price
                return $this->faker->numberBetween(10000000, 50000000);
            case 4: // On Top
                return $this->faker->boolean;
            case 5: // Deal Price
                return $this->faker->numberBetween(5000000, 30000000);
            case 6: // Sale Price
                return $this->faker->numberBetween(1000000, 30000000);
            case 7: // Sale Start Date
            case 8: // Sale End Date
                return $this->faker->date();
            case 9: // Rating
                return $this->faker->randomFloat(2, 1, 5);
            case 10: // Tồn kho
                return $this->faker->randomNumber();
            case 11: // Loại linh kiện
                return $this->faker->randomElement(['CPU', 'GPU', 'RAM', 'Storage']);
            case 12: // Thumbnail
            case 13: // Thumbnail Small
            case 14:
            case 15:
            case 16:
            case 17:
            case 18: // Image1, 15-18 Image2, Image3, ...
                return $this->faker->imageUrl(640, 480);
            case 19: // [Laptop] Loại laptop
                return $this->faker->randomElement(['Gaming', 'Office']);
            case 20: // [Laptop] Vi xử lý
                return $this->faker->word;
            case 21: // [Laptop] Số nhân
                return $this->faker->numberBetween(2, 16);
            case 22: // [Laptop] Số luồng
                return $this->faker->numberBetween(2, 32);
            case 23: // [Laptop] Tốc độ tối đa
                return $this->faker->randomFloat(2, 2.0, 5.0);
            case 24: // [Laptop] Bộ nhớ đệm
                return $this->faker->randomNumber();
            case 25: // [Laptop] Card đồ hoạ
                return $this->faker->word;
            case 26: // [Laptop] Kích thước màn hình
                return $this->faker->randomElement([13, 14, 15, 17]);
            case 27: // [Laptop] Độ phân giải
                return $this->faker->randomElement(['1920x1080', '2560x1440', '3840x2160']);
            case 28: // [Laptop] Tần số quét
                return $this->faker->randomElement([60, 120, 144, 240]);
            case 29: // [Laptop] Công nghệ màn hình
                return $this->faker->randomElement(['IPS', 'OLED', 'LCD']);
            case 30: // [Laptop] Dung lượng RAM
                return $this->faker->randomElement([8, 16, 32, 64]);
            case 31: // [Laptop] Loại RAM
                return $this->faker->randomElement(['DDR4', 'DDR5']);
            case 32: // [Laptop] Bus RAM
                return $this->faker->randomElement([2133, 2400, 3200, 3600]);
            case 33: // [Laptop] Số khe cắm RAM
                return $this->faker->numberBetween(1, 4);
            case 34: // [Laptop] Hỗ trợ RAM tối đa
                return $this->faker->randomElement([16, 32, 64]);
            case 35: // [Laptop] Pin
                return $this->faker->randomElement([3000, 4000, 5000, 6000]);
            case 36: // [Laptop] Ổ cứng
                return $this->faker->randomElement(['SSD', 'HDD']);
            case 37: // [Laptop] Dung lượng ổ cứng
                return $this->faker->randomElement([128, 256, 512, 1000]);
            case 38: // [Laptop] Số khe ổ cứng
                return $this->faker->numberBetween(1, 2);
            case 39: // [Laptop] Cân nặng
                return $this->faker->randomFloat(2, 1.0, 3.0);
            case 40: // [Laptop] Màu sắc
                return $this->faker->randomElement(['Black', 'Silver', 'Grey']);
            case 41: // [Laptop] OS
                return $this->faker->randomElement(['Windows', 'Linux', 'macOS']);
            case 42: // [Laptop] Camera
                return $this->faker->boolean;
            default:
                return null;
        }
    }
}

