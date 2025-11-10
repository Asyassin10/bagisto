@push('styles')
    <style>
        .modal-wrapper {
            position: sticky;
            display: none;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .comparator-bar {
            width: 100%;
            height: 74px;
            background: #27986F 0% 0% no-repeat padding-box;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 3%;
            position: relative;
        }

        .comparator-btn {
            display: flex;
            align-items: center;
        }

        .comparator-button {
            background: #F5F5F5 0% 0% no-repeat padding-box;
            box-shadow: 0px 1px 3px #00000029;
            border: 1px solid #F5F5F5;
            border-radius: 27px;
            opacity: 1;
            color: #27986F;
            padding: 8px 16px;
            cursor: pointer;
            text-align: left;
            font: normal normal medium 15px/20px Urbanist;
            letter-spacing: 0px;
            white-space: nowrap;
        }

        .comparator-text {
            color: #F5F5F5;
            margin-left: 20px;
            cursor: pointer;
            opacity: 1;
            background: none;
            border: none;
            font: inherit;
        }

        .comparator-dropdown {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            color: #F5F5F5;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .comparator-dropdown span {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .comparator-bar {
                flex-direction: column;
                height: auto;
                padding: 15px 3%;
            }

            .comparator-btn,
            .comparator-dropdown {
                width: 100%;
                justify-content: center;
                margin-bottom: 10px;
            }

            .comparator-dropdown {
                position: static;
                transform: none;
                order: -1;
                margin-bottom: 15px;
            }

            .comparator-btn {
                flex-direction: column;
                align-items: stretch;
            }

            .comparator-button,
            .comparator-text {
                text-align: center;
                margin: 5px 0;
            }

            .comparator-text {
                margin-left: 0;
            }
        }

        .comparator-content {
            background-color: white;
            padding: 20px;
            display: none;
            overflow-x: auto;
            /* Allow horizontal scrolling on small screens */
        }

        .comparator-items-container {
            display: flex;
            justify-content: flex-start;
            align-items: stretch;
            min-width: 800px;
            padding-left: 180px;
            padding-right: 180px;
        }

        .comparator-item {
            flex: 1;
            margin-right: 20px;
            max-width: 25%;
            min-width: 200px;
            display: flex;
            align-items: start !important;
            background: #FFFFFF;
            border: 1px solid #F5F5F5;
            border-radius: 27px;
            padding: 10px;
            height: 110px;
        }

        .comparator-item:last-child {
            margin-right: 0;
        }

        .comparator-item img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-right: 10px;
            margin-bottom: 34%;
        }

        .comparator-item-details {
             display: flex;
             flex: 1;
             width: 100%;
    flex-direction: row;
    align-items: start;
    justify-content: space-between;
    padding: 1rem;
    flex: 1 1 100%;
    max-width: 100%;
    box-sizing: border-box;
        }

        .comparator-item-title {
            font-weight: bold;
            margin-bottom: 60%;
            color: #333;
            font-size: 14px;
            line-height: 26px;
            font-size: 20px;

        }
        .comparator-item-bbtn{

        }

        .comparator-item-description {
            font-size: 12px;
            color: #666;
            line-height: 1.3;
        }

        @media (max-width: 1024px) {
            .comparator-items-container {
                flex-wrap: wrap;
                justify-content: flex-start;

            }

            .comparator-item {
                flex-basis: calc(50% - 20px);
                max-width: calc(50% - 20px);
                margin-bottom: 20px;
            }

            .comparator-item:nth-child(2n) {
                margin-right: 0;
            }
        }

        @media (max-width: 768px) {
            .comparator-items-container {
                flex-direction: column;
                min-width: unset;
                padding-left: 0px;
                padding-right: 0px;
            }

            .comparator-item {
                flex-basis: 100%;
                max-width: 100%;
                margin-right: 0;
                margin-bottom: 20px;
            }
        }

        #compare-loader {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200px;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush
@pushOnce('scripts')
    <div id="modal-compar" class="modal-wrapper">
        <div class="comparator-bar">
            <div class="comparator-btn">
                <a href="{{ route('shop.compare.index') }}" class="comparator-button">Comparer</a>
                <a id="vider" class="comparator-text">Vider</a>
            </div>
            <div class="comparator-dropdown" id="toggleComparator">
                <span id="comparator-dropdown-text"> Afficher la sélection des logiciels </span> <span
                    id="count-comparator"></span>
                <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        <div class="comparator-content" id="comparatorContent">
            <div class="comparator-items-container">
                <div class="comparator-item">
                    <div class="comparator-item-logo">
                        <img src="" alt="">
                    </div>
                    <div class="comparator-item-details">
                        <h3 class="comparator-item-title"></h3>
                        <p class="comparator-item-description"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggleComparator');
            const content = document.getElementById('comparatorContent');
            const comparator_dropdown_text = document.getElementById('comparator-dropdown-text');
            const toggleText = toggleBtn.querySelector('span');
            const toggleIcon = toggleBtn.querySelector('svg');
            const vider = document.getElementById('vider');
            const countElement = document.getElementById('count-comparator');
            const comparer_btn = document.querySelector('.comparer-btn');

            // Set initial state to rotated (180deg)
            toggleIcon.style.transform = 'rotate(180deg)';
            content.style.display = 'block';
            comparator_dropdown_text.innerHTML = 'Masquer la sélection des logiciels';

            toggleBtn.addEventListener('click', function() {
                if (content.style.display === 'none' || content.style.display === '') {
                    content.style.display = 'block';
                    comparator_dropdown_text.innerHTML = 'Masquer la sélection des logiciels';
                    toggleIcon.style.transform = 'rotate(180deg)';
                } else {
                    content.style.display = 'none';
                    comparator_dropdown_text.innerHTML = 'Afficher la sélection des logiciels';
                    toggleIcon.style.transform = 'rotate(0deg)';
                }
            });

            vider.addEventListener('click', () => {
                const allCompareBtns = document.querySelectorAll('.comparer-btn');
                allCompareBtns.forEach(btn => {
                    btn.innerHTML = "Comparer";
                });
                localStorage.removeItem('compare_items');
                countElement.innerHTML = "0/4";
/*                 content.style.display = 'none'; */
/*                 comparator_dropdown_text.innerHTML = 'Afficher la sélection des logiciels';
                toggleIcon.style.transform = 'rotate(0deg)'; */
                const contentHTML = `
                <div class="comparator-items-container">

                </div>`;
                content.innerHTML = contentHTML;
            });

            localStorage.removeItem('compare_items');
            countElement.innerHTML = "0/4";
            const contentHTML = `
                <div class="comparator-items-container">
                    <div class="comparator-item">
                    </div>
                </div>`;
            content.innerHTML = contentHTML;
        });
    </script>
@endpushOnce
