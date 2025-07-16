document.addEventListener('DOMContentLoaded', function() {
    // Create tooltip element
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip';
    document.body.appendChild(tooltip);

    // Track current active tooltip element
    let currentTooltipElement = null;

    // Function to update tooltip position and content
    function showTooltip(element) {
        const serviceDesc = element.dataset.desc;
        
        // Set tooltip content
        tooltip.textContent = serviceDesc;
        
        // Position tooltip
        const rect = element.getBoundingClientRect();
        const tooltipHeight = tooltip.offsetHeight;
        
        // Position tooltip above the element on desktop and below on mobile
        if (window.innerWidth <= 768) {
            tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = (rect.bottom + 10) + window.scrollY + 'px';
        } else {
            tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = (rect.top - tooltipHeight - 10) + window.scrollY + 'px';
        }
        
        // Make tooltip visible
        tooltip.classList.add('visible');
        currentTooltipElement = element;
        
        // Add active class to the service element
        element.classList.add('tooltip-active');
    }

    // Function to hide tooltip
    function hideTooltip() {
        tooltip.classList.remove('visible');
        
        // Remove active class from the current element if it exists
        if (currentTooltipElement) {
            currentTooltipElement.classList.remove('tooltip-active');
            currentTooltipElement = null;
        }
    }

    // Get all service elements
    const serviceElements = document.querySelectorAll('.plan__service');

    // Add click event listeners to each service element
    serviceElements.forEach(service => {
        service.addEventListener('click', function(e) {
            // If this element already has an active tooltip, hide it
            if (currentTooltipElement === service) {
                hideTooltip();
                return;
            }
            
            // Hide any existing tooltip
            hideTooltip();
            
            // Show tooltip for this element
            showTooltip(service);
            
            // Prevent event from bubbling up to document
            e.stopPropagation();
        });
    });

    // Hide tooltip when clicking elsewhere on the page
    document.addEventListener('click', function() {
        hideTooltip();
    });
    
    // Update tooltip position on window resize if it's visible
    window.addEventListener('resize', function() {
        if (currentTooltipElement) {
            showTooltip(currentTooltipElement);
        }
    });
});
