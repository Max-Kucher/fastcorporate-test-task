<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $htmlId;

    public array $events;

    public string $labels;

    public string $dataLogin;

    public string $dataLogout;

    public string $dataBuyCow;

    public string $dataDownload;

    public function mount(): void
    {
        $this->labels = json_encode(array_keys($this->events));
        $this->dataLogin = json_encode(array_column($this->events, 'login'));
        $this->dataLogout = json_encode(array_column($this->events, 'logout'));
        $this->dataBuyCow = json_encode(array_column($this->events, 'clickBuyCow'));
        $this->dataDownload = json_encode(array_column($this->events, 'clickDownload'));
    }
}; ?>

<div>
    <canvas id="{{ $htmlId }}"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Chart(document.getElementById('{!! $htmlId !!}'), {
                type: 'line',
                data: {
                    labels: {!! $labels !!},
                    datasets: [
                        {
                            label: 'Login',
                            borderColor: 'blue',
                            fill: false,
                            data: {!! $dataLogin !!},
                        },
                        {
                            label: 'Logout',
                            borderColor: 'red',
                            fill: false,
                            data: {!! $dataLogout !!},
                        },
                        {
                            label: 'Click "Buy a Cow"',
                            borderColor: 'green',
                            fill: false,
                            data: {!! $dataBuyCow !!},
                        },
                        {
                            label: 'Click "Download"',
                            borderColor: 'orange',
                            fill: false,
                            data: {!! $dataDownload !!},
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
