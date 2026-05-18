use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Di Oracle akan jadi Sequence & Trigger otomatis
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('package_name');
            $table->integer('total_price');
            $table->string('payment_method'); // 'qris' atau 'cash'
            $table->string('payment_proof')->nullable(); // Nama file gambar
            $table->string('status')->default('pending'); // 'pending', 'confirmed', 'rejected'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};